<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function surat_masuk(){
        return view('halaman.surat.surat_masuk.surat_masuk');
    }
}
