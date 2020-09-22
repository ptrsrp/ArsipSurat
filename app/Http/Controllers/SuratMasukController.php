<?php

namespace App\Http\Controllers;
use File;
use App\Instansi;
use App\SuratMasuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
        $surat_masuk = SuratMasuk::with('instansi')->orderBy('tgl_diterima', 'DESC');
        $surat_masuk = $surat_masuk->paginate(50);
        return view('halaman.surat.surat-masuk.index', compact('surat_masuk'));
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat-masuk.tambah', compact('instansi'));
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

        $file = $request->file('file');
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/arsip/surat-masuk'), $filename);

        SuratMasuk::create([
            'no_agenda' => $request->no_agenda,
            'tgl_diterima' => $request->tgl_diterima,
            'id_instansi' => $request->id_instansi,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-masuk')->with('success','Data Berhasil Ditambahkan!');
    }

    public function edit($id){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        $surat_masuk = SuratMasuk::findorfail($id);
        return view('halaman.surat.surat-masuk.edit', compact('instansi','surat_masuk'));
    }
    public function update(Request $request, $id){
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
            'file' => 'mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);
        $surat_masuk = SuratMasuk::findorfail($id);
        if ($request->has('file') != '') {
            //hapus dahulu file lama
            $file_lama = $surat_masuk->file;
            File::delete('storage/arsip/surat-masuk/'.$file_lama);

            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/arsip/surat-masuk'), $filename);
        }
        else{
            $filename = $surat_masuk->file;
        }
        $surat_masuk->update([
            'no_agenda' => $request->no_agenda,
            'tgl_diterima' => $request->tgl_diterima,
            'id_instansi' => $request->id_instansi,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'perihal' => $request->perihal,
            'file' => $filename,
        ]);
        return redirect()->route('surat-masuk')->with('success','Data Berhasil Diubah!');
    }
    public function destroy($id){
        $surat_masuk = SuratMasuk::findorfail($id);
        //hapus file dari folder
        File::delete('storage/arsip/surat-masuk/'.$surat_masuk->file);
        //hapus data di database
        $surat_masuk->delete();
        return redirect()->route('surat-masuk')->with('info','Data Berhasil Dihapus!');
    }
    
}