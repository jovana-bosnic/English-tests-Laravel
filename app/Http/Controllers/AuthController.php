<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends MainController
{
    public function login(){
        return view('pages.users.login', $this->data);
    }

    public function register(){
        return view('pages.users.register', $this->data);
    }

    public function doLogin(Request $request){
        $user = User::where('email', $request->email)->where('password', md5($request->password))->first();

        if(!$user){
            return redirect()->route('login')->with('error', 'Invalid email or password');
        }

        session()->put('user', $user);
        return redirect()->route('tests.index');
    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('home');
    }

    public function doRegister(UserRegisterRequest $request){
        try {
            $model = new User();
            $model->insertUser($request);
            return  redirect()->route('login')->with("success", "Your registration was successful. Please log in.");
        }
        catch(\Exception $ex) {
            Log::error($ex->getMessage());
            session()->put('errors', $ex);
            return redirect()->back()->with("error", "There was an error processing your request");
        }

    }
}
