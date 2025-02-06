<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
    ];

    public function insertUser($request){
        \DB::table("users")->insert([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => md5($request->password),
            'role_id' => 2
        ]);
    }

    public function sendMessage($request){

        if($request->userId != null){
            $user =  \DB::table("users")->where("id", $request->userId)->first();

            if($user != null){
                \DB::table("messages")->insert([
                    'user_id' => $user->id,
                    'message' => $request->message
                ]);
            }
        }
        else if($request->message != ""){
            \DB::table("messages")->insert([
                'email' => $request->email,
                'message' => $request->message
            ]);
        }
    }

    public function getAllMessages(){
        $query = \DB::table("messages as m");
        $query->leftJoin('users as u', 'u.id', '=', 'm.user_id');
        $query->select('u.email as userEmail', 'm.email as messageEmail', 'm.message');
        return $query->get();
    }

    public function getStatistics(){

        $statistics = new \Illuminate\Support\Collection();

        $mostPopularCategoryId = \DB::table('tests')
            ->groupBy('category_id')
            ->select('category_id', \DB::raw('count(*) as total'))
            ->orderBy('total', 'desc')
            ->first();

        $averageResults = \DB::table('tests')
            ->groupBy('category_id')
            ->select('category_id', \DB::raw('sum(result)/count(*) as total'))
            ->get();

        $bestResultsCategoryId = $averageResults->sortByDesc('total')->first();
        $worstResultsCategoryId = $averageResults->sortBy('total')->first();

        $statistics->mostPopular = \DB::table("categories")
                                    ->where("id", $mostPopularCategoryId->category_id)
                                    ->select("name")
                                    ->first();
        $statistics->bestResult = \DB::table("categories")
                                    ->where("id", $bestResultsCategoryId->category_id)
                                    ->select("name")
                                    ->first();
        $statistics->worstResult = \DB::table("categories")
                                    ->where("id", $worstResultsCategoryId->category_id)
                                    ->select("name")
                                    ->first();
        return $statistics;
    }
}
