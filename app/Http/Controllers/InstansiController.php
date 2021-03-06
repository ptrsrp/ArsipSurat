<?php

namespace App\Http\Controllers;

use DataTables;
use App\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function json(){
        $instansi = Instansi::latest()->get();
        return Datatables::of($instansi)
        ->addColumn('action', function ($instansi) {
            return '<form action="/hapus-instansi/'.$instansi->id.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-instansi/'.$instansi->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('halaman.instansi.index');
    }

    public function create()
    {
        return view('halaman.instansi.tambah');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required',
        ],$messages); 
        Instansi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        return redirect('instansi')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $instansi = Instansi::findorfail($id);
        return view('halaman.instansi.edit', compact('instansi'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required',
        ], $messages); 
        
        Instansi::where(['id' => $id])->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
        ]);        
        return redirect('instansi')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $instansi = Instansi::findorfail($id);
        $instansi->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
