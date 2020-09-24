<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Disposisi;
use App\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        $disposisi = Disposisi::with('surat_masuk','pegawai')->orderBy('nippos_pgw','ASC')->paginate(5);
        return view('halaman.surat.disposisi.index',compact('disposisi'));
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
