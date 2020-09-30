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
            <a href="/edit-bagian/'.$bagian->id.'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button></form>'; 
            
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
    public function index(){
        return view('halaman.pegawai.bagian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman.pegawai.bagian.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bagian = Bagian::findorfail($id);
        return view('halaman.pegawai.bagian.edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian = Bagian::findorfail($id);
        $bagian->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
