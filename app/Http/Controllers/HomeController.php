<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('templates.default');
    }

    public function surat(){
        return view('halaman.surat.index');
    }

    public function instansi(){
        return view('halaman.instansi.index');
    }
    public function pegawai(){
        return view('halaman.pegawai.index');
    }

    public function petugas(){
        return view('halaman.petugas.index');
    }
}
