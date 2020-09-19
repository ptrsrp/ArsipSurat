<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
        $surat_masuk = SuratMasuk::with('instansi')->paginate(50);
        $sorted = $surat_masuk->sortByDesc('tgl_diterima');
        return view('halaman.surat.surat_masuk.index', compact('surat_masuk'));
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat_masuk.tambah', compact('instansi'));
    }

    public function store(Request $request){
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        $this->validate($request,[
    		'no_agenda' => 'required',
    		'tgl_diterima' => 'required',
    		'id_instansi' => 'required',
    		'no_surat' => 'required',
    		'tgl_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'required',
    	], $messages);
        SuratMasuk::create([
            'no_agenda' => $request->no_agenda,
    		'tgl_diterima' => $request->tgl_diterima,
    		'id_instansi' => $request->id_instansi,
    		'no_surat' => $request->no_surat,
    		'tgl_surat' => $request->tgl_surat,
    		'perihal' => $request->perihal,
    		'file' => $request->file,
        ]);
        return redirect()->route('data.pegawai')->with('success','Data Berhasil Ditambahkan!');
    }
}
