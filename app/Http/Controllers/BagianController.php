<?php

namespace App\Http\Controllers;
use DataTables;
use App\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function json()
    {
        $bagian = Bagian::latest()->get();
        return Datatables::of($bagian)
        ->addColumn('action', function ($bagian) {
            return '<form action="/hapus-bagian/'.$bagian->id.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-bagian/'.$bagian->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
            
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
    public function index(){
        return view('halaman.pegawai.bagian.index');
    }

    public function create()
    {
        return view('halaman.pegawai.bagian.tambah');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
        ],$messages); 
        Bagian::create([
            'nama' => $request->nama,
        ]);
        return redirect('bagian')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $bagian = Bagian::findorfail($id);
        return view('halaman.pegawai.bagian.edit', compact('bagian'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];
        $this->validate($request,[
    		'nama' => 'required',
        ],$messages); 
        
        Bagian::where(['id' => $id])->update([
            'nama'=> $request->nama,
        ]);        
        return redirect('bagian')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $bagian = Bagian::findorfail($id);
        $bagian->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
