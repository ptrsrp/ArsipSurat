<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function editProfil()
    {
        $user = Auth::user();
        return view('halaman.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal 6 karakter!',
        ];
        $this->validate($request,[
    		'name' => 'required',
    		'level' => 'required',
    		'username' => 'required',
    		'password' => 'min:6',
        ], $messages);

        $user = Auth::user();

        $user->name = $request->name;
        $user->level = $request->level;
        $user->username = $request->username;
        $user->save();
        
        return redirect()->route('profil.edit')->with('success','Data Berhasil Diubah!');
    }
    
    public function destroy($id)
    {
        //
    }

    public function gantiPassword(){
        $user = Auth::user();
        return view('halaman.password', compact('user'));
    }
}
