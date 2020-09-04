<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('templates.default');
    }

    public function pegawai(){
        return view('admin.pegawai.index');
    }

    public function petugas(){
        return view('admin.petugas.index');
    }
}
