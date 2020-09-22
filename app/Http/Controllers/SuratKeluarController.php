<?php

namespace App\Http\Controllers;
use File;
use App\Instansi;
use App\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $surat_keluar = SuratKeluar::with('instansi')->orderBy('tgl_kirim', 'DESC');
        $surat_keluar = $surat_keluar->paginate(50);
        return view('halaman.surat.surat-keluar.index',compact('surat_keluar'));
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat-keluar.tambah', compact('instansi'));
    }
    public function store(Request $request){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
    		'tgl_kirim' => 'required',
    		'penerima' => 'required',
    		'no_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'required|mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);

        $file = $request->file('file');
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/arsip/surat-keluar'), $filename);

        SuratKeluar::create([
            'tgl_kirim' => $request->tgl_kirim,
            'penerima' => $request->penerima,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-keluar')->with('success','Data Berhasil Ditambahkan!');
    }
    public function edit($id){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        $surat_keluar = SuratKeluar::findorfail($id);
        return view('halaman.surat.surat-keluar.edit', compact('instansi','surat_keluar'));
    }
    public function update(Request $request, $id){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
            'tgl_kirim' => 'required',
    		'penerima' => 'required',
    		'no_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);
        $surat_keluar = SuratKeluar::findorfail($id);
        if ($request->has('file') != '') {
            //hapus dahulu file lama
            $file_lama = $surat_keluar->file;
            File::delete('storage/arsip/surat-keluar/'.$file_lama);

            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/arsip/surat-keluar'), $filename);
        }
        else{
            $filename = $surat_keluar->file;
        }
        $surat_keluar->update([
            'tgl_kirim' => $request->tgl_kirim,
            'penerima' => $request->penerima,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-keluar')->with('success','Data Berhasil Diubah!');
    }
    public function destroy($id){
        $surat_keluar = SuratKeluar::findorfail($id);
        //hapus file dari folder
        File::delete('storage/arsip/surat-keluar/'.$surat_keluar->file);
        //hapus data di database
        $surat_keluar->delete();
        return redirect()->route('surat-keluar')->with('info','Data Berhasil Dihapus!');
    }
}
