<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\SuratMasuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(){
        $surat_masuk = SuratMasuk::with('instansi')->orderBy('tgl_diterima', 'DESC');
        $surat_masuk = $surat_masuk->paginate(50);
        return view('halaman.surat.surat_masuk.index', compact('surat_masuk'));
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat_masuk.tambah', compact('instansi'));
    }

    public function store(Request $request){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
    		'no_agenda' => 'required',
    		'tgl_diterima' => 'required',
    		'id_instansi' => 'required',
    		'no_surat' => 'required',
    		'tgl_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'required|mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->no_surat. '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat', $filename);

            SuratMasuk::create([
                'no_agenda' => $request->no_agenda,
                'tgl_diterima' => $request->tgl_diterima,
                'id_instansi' => $request->id_instansi,
                'no_surat' => $request->no_surat,
                'tgl_surat' => $request->tgl_surat,
                'perihal' => $request->perihal,
                'file' => $filename
            ]);  
        }
        return redirect()->route('surat-masuk')->with('success','Data Berhasil Ditambahkan!');
    }
    public function destroy($id){
        $surat_masuk = SuratMasuk::findorfail($id);
        $surat_masuk->delete();
        return redirect()->route('surat-masuk')->with('info','Data Berhasil Dihapus!');
    }
    
}