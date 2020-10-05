<?php

namespace App\Http\Controllers;

use DataTables;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function json()
    {
        $user = User::latest()->get();
        return Datatables::of($user)
        ->addColumn('action', function ($user) {
            return '<form action="/hapus-user/'.$user->id.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-user/'.$user->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
    public function index()
    {
        return view('halaman.users.index');
    }

    public function create()
    {
        return view('halaman.users.tambah');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal 5 karakter!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
    		'name' => 'required',
    		'level' => 'required',
    		'username' => 'required|unique:users',
    		'password' => 'required|min:6',
    	], $messages);
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users')->with('success','Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('halaman.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
    		'name' => 'required',
    		'level' => 'required',
    		'username' => 'required|unique:users',
    	],$messages);
        User::where(['id' => $id])->update([
            'name' => $request->name,
            'level' => $request->level,
            'username' => $request->username,
        ]);
        return redirect()->route('users')->with('success','Data Berhasil Diupdate!');
    }
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }

}
