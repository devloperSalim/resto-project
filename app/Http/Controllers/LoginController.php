<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login.show');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];
        // dd($credentials);
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            return view('gerer.gerer')->with('success','u connected successfoly');;
        }else{
            return back()->withErrors([
                'email'=>'email or password not correct'
            ])->onlyInput('email');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return view('home');
    }

}
