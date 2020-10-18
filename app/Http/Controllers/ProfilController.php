<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function editProfil()
    {
        $user = Auth::user();
        return view('halaman.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $id = auth()->user()->id;
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
    		'name' => 'required',
    		'username' => "required|unique:users,username,$id",
        ], $messages);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();
        
        return redirect()->route('profil.edit')->with('success','Data Berhasil Diubah!');
    }
}
