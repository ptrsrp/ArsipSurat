<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;


class PasswordController extends Controller
{
    public function gantiPassword(){
        $user = Auth::user();
        return view('halaman.password', compact('user'));
    }
    public function updatePassword(UpdatePasswordRequest $request){
        // $messages = [
        //     'min' => 'password minimal 6 karakter!',
        // ];
        // $this->validate($request,[
    	// 	'password_baru' => 'min:6',
        // ], $messages);

        // $user = Auth::user();
        // $user->password = Hash::make($request->password_baru);
        // $user->save();
        $request->user()->update([
            'password' => Hash::make($request->password_baru)
        ]);
        return redirect()->route('ganti.password')->with('success','Password Berhasil Diubah!');
    }
    
}
