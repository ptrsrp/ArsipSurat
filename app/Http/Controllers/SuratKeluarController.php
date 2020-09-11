<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function surat_keluar(){
        return view('halaman.surat.surat_keluar.surat_keluar');
    }
}
