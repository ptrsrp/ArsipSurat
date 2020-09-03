<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('users.login');
    }

    public function postlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}