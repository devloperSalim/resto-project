<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('category.index');
        }else{
            return back();
        }
    }

}
