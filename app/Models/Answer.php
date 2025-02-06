<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    public function getAnswers($id): \Illuminate\Support\Collection
    {
        $query = DB::table('exercises as e');
        $query->where('e.category_id', $id);
        $query->join('exercises_types as et', 'et.id', '=', 'e.type_id');
        $query->join('questions as q', 'e.id', '=', 'q.exercise_id');
        $query->join('answers as a', 'q.id', '=', 'a.question_id');
        $query->where('a.is_correct', 1);
        $query->select("a.text", "q.id as questionId", "q.explanation", "et.name as type");

        return $query->get();
    }
}
