<?php

namespace App\Http\Controllers;

use DataTables;
use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function json()
    {
        $jabatan = Jabatan::latest()->get();
        return Datatables::of($jabatan)
        ->addColumn('action', function ($jabatan) {
            return '<form action="/hapus-jabatan/'.$jabatan->id.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-jabatan/'.$jabatan->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
    public function index()
    {
        return view('halaman.pegawai.jabatan.index');
    }

    public function create()
    {
        return view('halaman.pegawai.jabatan.tambah');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
        ], $messages); 

        Jabatan::create([
            'nama' => $request->nama,
        ]);
        return redirect('jabatan')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findorfail($id);
        return view('halaman.pegawai.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
        ],$messages); 
        Jabatan::where(['id' => $id])->update([
            'nama'=> $request->nama,
        ]);        
        return redirect('jabatan')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findorfail($id);
        $jabatan->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
