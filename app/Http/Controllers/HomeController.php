<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('halaman.dashboard');
    }
    public function setting(){
        return view('halaman.setting');
    }

    public function surat(){
        return view('halaman.surat.index');
    }
    
    public function pegawai(){
        return view('halaman.pegawai.index');
    }
}
