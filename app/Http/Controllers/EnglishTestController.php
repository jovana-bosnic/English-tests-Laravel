<?php


namespace App\Http\Controllers;


use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class EnglishTestController extends MainController
{
    private $testModel;

    public function __construct()
    {
        parent::__construct();
        $this->testModel = new Tests();
    }

    public function index(Request $request)
    {
        $this->data['categories'] = $this->testModel->getAllTestCategory($request);
        return view('pages.tests.index', $this->data);
    }

    public function show($test)
    {
        $this->data['tests'] = $this->testModel->getTests($test);
        $this->data['categories'] = $this->testModel->getTestCategory($test);
        return view('pages.tests.show', $this->data);
    }

    public function create(){
        $this->data["categories"] = \DB::table("categories")->where("parent_id", null)->get();
        return view('pages.tests.create', $this->data);
    }

    public function store(Request $request){
        return $this->testModel->storeTest($request);
    }

    public function edit($test)
    {
        $this->data['tests'] = $this->testModel->getTests($test);
        $this->data['categories'] = $this->testModel->getTestCategory($test);
        return view('pages.tests.edit', $this->data);
    }

    public function update(Request $request, $test){
        try {
            \DB::beginTransaction();

                $this->testModel->updateTests($request, $test);

            \DB::commit();

            return redirect()->route('admin')->with("success", "Update successfull.");
        } catch (Exception $ex){

            \DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->back()->with("error", "There was an error processing your request.");
        }
    }

    public function destroy($test)
    {
        try{
            \DB::commit();

            $this->testModel->deleteTest($test);
            return redirect()->back()->with("success", "You have successfully deleted test.");
        }
        catch (Exception $ex){
            Log::error($ex->getMessage());
            \DB::rollBack();
            return redirect()->back()->with("error", $ex);
        }
    }
}
