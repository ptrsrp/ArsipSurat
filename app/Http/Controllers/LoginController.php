<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function postlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->with('alert','Username atau Password, Salah !');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}