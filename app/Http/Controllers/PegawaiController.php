<?php

namespace App\Http\Controllers;

use App\Bagian;
use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::with('bagian','jabatan')->paginate(5);
        return view('halaman.pegawai.data-pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        return view('halaman.pegawai.tambah-pegawai', compact('bagian','jabatan'));
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
            'min' => ':attribute minimal 9 karakter!',
            'numeric' => ':attribute harus di isi angka!',
        ];
        $this->validate($request,[
    		'nippos' => 'required',
    		'nama' => 'required',
    		'bagian' => 'required',
    		'jabatan' => 'required',
    	], $messages);
        Pegawai::create([
            'nippos' => $request->nippos,
            'nama' => $request->nama,
            'id_bagian' => $request->id_bagian,
            'id_jabatan' => $request->id_jabatan,
        ]);
        return redirect()->route('data.pegawai')->with('success','Data Berhasil Ditambahkan!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
