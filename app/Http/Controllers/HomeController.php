<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('templates.default');
    }

    public function surat(){
        return view('admin.surat.index');
    }

    public function instansi(){
        return view('admin.instansi.index');
    }
    public function pegawai(){
        return view('admin.pegawai.index');
    }

    public function petugas(){
        return view('admin.petugas.index');
    }
}
