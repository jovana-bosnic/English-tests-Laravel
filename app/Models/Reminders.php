<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reminders extends Model
{
    use HasFactory;

    public function storeReminder(Request $request){

        $path = $request->file('picture')->store('temp');
        $file = $request->file('picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/img'), $fileName);

        \DB::table("reminders")->insert([
            "alt" => $request->alt,
            "path" => $fileName
        ]);
    }

    public function deleteReminder($id){

    }
}
