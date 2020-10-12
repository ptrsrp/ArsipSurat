<?php

namespace App\Http\Controllers;

use DataTables;
use App\Bagian;
use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function json(){
        $pegawai = Pegawai::with('bagian', 'jabatan')->latest()->get();
        return Datatables::of($pegawai)
        ->editColumn('id_bagian', function($pegawai){
            return $pegawai->bagian->nama;
        })
        ->editColumn('id_jabatan', function($pegawai){
            return $pegawai->jabatan->nama;
        })
        ->addColumn('action', function ($pegawai) {
            return '<form action="/hapus-pegawai/'.$pegawai->nippos.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-pegawai/'.$pegawai->nippos.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
            
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('halaman.pegawai.pegawaiData.index');
    }

    public function create()
    {
        $bagian = Bagian::orderBy('nama','ASC')->get();
        $jabatan = Jabatan::orderBy('nama','ASC')->get();
        return view('halaman.pegawai.pegawaiData.tambah', compact('bagian','jabatan'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah ada!',
            'min' => ':attribute minimal 9 digit!',
            'max' => ':attribute maksimal 9 digit!',
        ];
        $this->validate($request,[
    		'nippos' => 'required|unique:pegawai|min:9|max:9',
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
        $bagian = Bagian::orderBy('nama','ASC')->get();
        $jabatan = Jabatan::orderBy('nama','ASC')->get();
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
    		'nippos' => "required|unique:pegawai,nippos,$nippos,nippos",
    		'nama' => 'required',
    		'id_bagian' => 'required',
    		'id_jabatan' => 'required',
        ], $messages);
        $pegawai = Pegawai::findorfail($nippos);
        $pegawai->nippos = $request->nippos;
        $pegawai->nama = $request->nama;
        $pegawai->id_bagian = $request->id_bagian;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->save();
        return redirect()->route('data.pegawai')->with('success','Data Berhasil Diubah!');
    }

    public function destroy($nippos)
    {
        $pegawai = Pegawai::findorfail($nippos);
        $pegawai->delete();
        return redirect()->route('data.pegawai')->with('info','Data Berhasil Dihapus!');
    }
}
