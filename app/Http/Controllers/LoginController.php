<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            Session::flash('error', 'Username atau Password Salah!');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}