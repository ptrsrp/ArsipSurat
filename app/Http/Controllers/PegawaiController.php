<?php

namespace App\Http\Controllers;

use App\Bagian;
use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('bagian','jabatan')->paginate(5);
        return view('halaman.pegawai.pegawaiData.index', compact('pegawai'));
    }

    public function create()
    {
        $bagian = Bagian::orderBy('nama','ASC')->get();;
        $jabatan = Jabatan::orderBy('nama','ASC')->get();;
        return view('halaman.pegawai.pegawaiData.tambah', compact('bagian','jabatan'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
    		'nippos' => 'required|unique:pegawai',
    		'nama' => 'required',
    		'id_bagian' => 'required',
    		'id_jabatan' => 'required',
    	], $messages);
        Pegawai::create([
            'nippos' => $request->nippos,
            'nama' => $request->nama,
            'id_bagian' => $request->id_bagian,
            'id_jabatan' => $request->id_jabatan,
        ]);
        return redirect()->route('data.pegawai')->with('success','Data Berhasil Ditambahkan!');
    }

    public function edit($nippos)
    {
        $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::findorfail($nippos);
        return view('halaman.pegawai.pegawaidata.edit', compact('pegawai','bagian','jabatan'));
    }

    public function update(Request $request, $nippos)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
    		'nippos' => 'required|unique:pegawai',
    		'nama' => 'required',
    		'id_bagian' => 'required',
    		'id_jabatan' => 'required',
    	], $messages);
        Pegawai::where(['nippos' => $nippos ])->update([
            'nippos' => $request->nippos,
            'nama' => $request->nama,
            'id_bagian' => $request->id_bagian,
            'id_jabatan' => $request->id_jabatan,
        ]);
        return redirect()->route('data.pegawai')->with('success','Data Berhasil Diubah!');
    }

    public function destroy($nippos)
    {
        $pegawai = Pegawai::findorfail($nippos);
        $pegawai->delete();
        return redirect()->route('data.pegawai')->with('info','Data Berhasil Dihapus!');
    }
}
