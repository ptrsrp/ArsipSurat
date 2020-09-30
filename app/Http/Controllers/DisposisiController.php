<?php

namespace App\Http\Controllers;

use DataTables;
use App\Pegawai;
use App\Disposisi;
use App\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisposisiController extends Controller
{
    public function json(){
        $disposisi = Disposisi::with('surat_masuk','pegawai')->latest()->get();
        return Datatables::of($disposisi)
        ->editColumn('id_surat_masuk', function($disposisi){
            $file = $disposisi->surat_masuk->file;
                return '<a href="'.url('storage/arsip/surat-masuk/'.$file.'').'" target="_blank">
                Lihat Dokumen</a>';
        })
        ->editColumn('nippos_pgw', function($disposisi){
            return $disposisi->pegawai->nama;
        })
        ->addColumn('action', function ($disposisi) {
            return "<form action='/hapus-disposisi/".$disposisi->id."' method='POST' >".csrf_field()." 
            <input type='hidden' name='_method' value='DELETE' class='form-control'>
            <a href='/edit-disposisi/".$disposisi->id."' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
            <button onclick='return confirm_delete()' type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button></form>";
        })
        ->rawColumns(['id_surat_masuk','action'])
        ->make(true);
    }
    public function index()
    {
        return view('halaman.surat.disposisi.index');
    }

    
    public function create()
    {
        $disposisi = Disposisi::with('surat_masuk','pegawai')->paginate(5);
        $surat_masuk = SuratMasuk::orderBy('tgl_diterima','DESC')->get();
        $pegawai = Pegawai::orderBy('nama','ASC')->get();
        return view('halaman.surat.disposisi.tambah',compact('surat_masuk','disposisi','pegawai'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
            'id_surat_masuk' => 'required',
            'nippos_pgw' => 'required',
            'isi' => 'required'
        ], $messages);

        Disposisi::create([
            'id_surat_masuk' => $request->id_surat_masuk,
            'nippos_pgw' => $request->nippos_pgw,
            'isi' => $request->isi,
        ]);
        return redirect()->route('disposisi')->with('success','Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $surat_masuk = SuratMasuk::orderBy('tgl_diterima','DESC')->get();
        $pegawai = Pegawai::orderBy('nama','ASC')->get();
        $disposisi = Disposisi::findorfail($id);
        return view('halaman.surat.disposisi.edit',compact('disposisi','surat_masuk','pegawai'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
            'id_surat_masuk' => 'required',
            'nippos_pgw' => 'required',
            'isi' => 'required'
        ], $messages);

        Disposisi::where(['id' => $id])->update([
            'id_surat_masuk' => $request->id_surat_masuk,
            'nippos_pgw' => $request->nippos_pgw,
            'isi' => $request->isi,
        ]);
        return redirect()->route('disposisi')->with('success','Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $disposisi = Disposisi::findorfail($id);
        $disposisi->delete();
        return redirect()->route('disposisi')->with('info','Data Berhasil Dihapus!');
    }
}
