<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class Tests extends Model
{
    public function getTests($id): \Illuminate\Support\Collection
    {

        $query = DB::table('exercises as e');
        $query->where('e.category_id', $id);
        $query->join('exercises_types as et', 'et.id', '=', 'e.type_id');
        $query->select("e.id as exerciseId", "et.name as type", "e.text", "e.assignment", "e.order");
        $query->orderBy("e.order");

        $exercises = $query->get();
        foreach ($exercises as $exercise){
            $exercise->questions = DB::table('questions')->where('exercise_id', $exercise->exerciseId)->get();

            foreach ($exercise->questions as $question){
                $question->answers = DB::table('answers as a')->where('a.question_id', $question->id)->get();
            }
        }

        return $exercises;
    }

    public function getTestCategory($id):array
    {
        $parentId = DB::table('categories')->where('id', $id)->first()->parent_id;
        $category = DB::table('categories')->where('id', $parentId)->first()->name;
        $subcategory = DB::table('categories')->where('id', $id)->first()->name;

         return array('category' => $category, 'subcategory' => $subcategory, 'idCategory' => $id);
    }

    public function getAllTestCategory($request): \Illuminate\Support\Collection
    {
        $categories = DB::table('categories')->where('parent_id', null)->get();

        foreach ($categories as $category){

            if($request->has('categoryFilter')){
                if($request->categoryFilter > 0 && $request->categoryFilter != $category->id){
                    $category->subcategories = null;

                    continue;
                }
            }

            $subcategories = DB::table('categories')
                ->where('parent_id', $category->id);

            if($request->has('testName')) {
                $subcategories = $subcategories->where('name', 'LIKE', '%' . $request->get('testName') . '%');
            }

            $category->subcategories = $subcategories->get();

            foreach ($category->subcategories as $subcategory){

                $subcategory->tests = DB::table('tests')
                    ->where('category_id', $subcategory->id)
                    ->where('user_id', session()->get('user')->id)
                    ->get();
            }
        }

        return $categories;
    }

    public function storeResult($request){

        $result = $request->sum * 100 / $request->countAnswers;

        return \DB::table("tests")->insert([
            "category_id" => $request->testId,
            "user_id" => session()->get('user')->id,
            "result" => $result
        ]);
    }

    public function storeTest($request){

        $category = DB::table('categories')
            ->where('id', $request->testCategory)
            ->first();

        $subcategory = DB::table('categories')
            ->where('name', $request->testName)
            ->select("id")
            ->first();

        if($subcategory != null){
            return redirect()->back()->with("error", "Test name already exist.");
        }

        if($category != null){
            $catId =  \DB::table("categories")->insertGetId([
                "parent_id" => $request->testCategory,
                "name" => $request->testName
            ]);

            try{
                \DB::beginTransaction();
                    $this->storeExercises($request, $catId);
                \DB::commit();

                return redirect()->back()->with("success", "You have successfully created a new test.");
            }
            catch (Exception $ex){
                Log::error($ex->getMessage());
                \DB::rollBack();
                return redirect()->back()->with("error", $ex);
            }
        }
        else{
            return redirect()->back()->with("error", "Chosen category doesn't exist.");
        }
    }

    public function storeExercises($request, $catId){

        for($i = 1; $i <= 5; $i++){

            if($request["exerciseText".$i] != null && $request["exType".$i] != null){

                $exerciseId = \DB::table("exercises")->insertGetId([
                    "category_id" => $catId,
                    "text" => $request["exerciseText".$i],
                    "assignment" => $request["assignment". $i],
                    "order" => $i,
                    "type_id" => $request["exType".$i],
                ]);

                $this->storeQuestions($request, $exerciseId, $i);
            }
        }
    }

    public function storeQuestions($request, $exerciseId, $exNum){

        for($i = 1; $i <= 3; $i++){

            $first = $request["q".$i."ex".$exNum."textFirst"];
            $second = $request["q".$i."ex".$exNum."textSecond"];

            if($first != null || $second != null){
                $questionId = \DB::table("questions")->insertGetId([
                    "exercise_id" => $exerciseId,
                    "text_first" => $first,
                    "text_second" => $second,
                    "explanation" => $request["q".$i."ex".$exNum."explanation"]
                ]);

                $this->storeAnswers($request, $questionId, $exNum, $i);
            }
        }
    }

    public function storeAnswers($request, $questionId, $exNum, $qNum){
        for($i = 1; $i <= 1; $i++){

            \DB::table("answers")->insert([
                "question_id" => $questionId,
                "text" => $request["q".$qNum."ex".$exNum."correct"],
                "is_correct" => true
            ]);

            if($request["exType".$exNum] == 2){
                \DB::table("answers")->insert([
                    "question_id" => $questionId,
                    "text" => $request["q".$qNum."ex".$exNum."false1"],
                    "is_correct" => false
                ]);

                \DB::table("answers")->insert([
                    "question_id" => $questionId,
                    "text" => $request["q".$qNum."ex".$exNum."false2"],
                    "is_correct" => false
                ]);
            }
        }
    }

    public function updateTests($request, $test){

        $exercises = $this->getTests($test);

        foreach ($exercises as $exercise){

            DB::table('exercises')
                ->where('id', $exercise->exerciseId)->update([
                "text" => $request["exerciseText".$exercise->exerciseId],
                "assignment" => $request["assignment". $exercise->exerciseId],
                "type_id" => $request["exType".$exercise->exerciseId],
            ]);

            foreach ($exercise->questions as $question){

                DB::table('questions')
                    ->where('id', $question->id)->update([
                    "text_first" => $request["q".$question->id."ex".$exercise->exerciseId."textFirst"],
                    "text_second" => $request["q".$question->id."ex".$exercise->exerciseId."textSecond"],
                    "explanation" => $request["q".$question->id."ex".$exercise->exerciseId."explanation"]
                ]);

                $falseCount = 1;
                foreach ($question->answers as $answer){

                    if($answer->is_correct){
                        DB::table('answers')
                            ->where('id', $answer->id)->update([
                            "text" => $request["q".$question->id."ex".$exercise->exerciseId."correct"]
                        ]);
                    }
                    else{
                        DB::table('answers')
                            ->where('id', $answer->id)->update([
                            "text" => $request["q".$question->id."ex".$exercise->exerciseId."false".$falseCount++]
                        ]);
                    }
                }
            }
        }
    }

    public function deleteTest($id){

        $tests = DB::table('tests')
                ->where('category_id', (int)$id)
                ->select('id')
                ->get();

        foreach ($tests as $test){
            DB::table('tests')
                ->where('id', $test->id)
                ->delete();
        }

        $exercises = DB::table('exercises')
                ->where('category_id', (int)$id)
                ->select('id')
                ->get();

        foreach ($exercises as $exercise){

            $questions = DB::table('questions')
                ->where('exercise_id', $exercise->id)
                ->select('id')
                ->get();

            foreach ($questions as $question){
                $answers = DB::table('answers')
                    ->where('question_id', $question->id)
                    ->select('id')
                    ->get();

                foreach ($answers as $answer){
                    DB::table('answers')
                        ->where('id', $answer->id)
                        ->delete();
                }

                DB::table('questions')
                    ->where('id', $question->id)
                    ->delete();
            }
            DB::table('exercises')
                ->where('id', $exercise->id)
                ->delete();
        }

            DB::table('categories')
                ->where('id', $id)
                ->delete();

    }

    public function storeCategory($request){
        \DB::table("categories")->insert([
            "name" => $request->name
        ]);
    }

    public function getBusinessCategories(){

        $business =  DB::table('categories')
            ->where('name', 'Business')
            ->first();

        return DB::table('categories')
            ->where('parent_id', $business->id)
            ->take(4)
            ->get();
    }
}
