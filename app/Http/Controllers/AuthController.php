<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function changePassword()
    {
        return view('auth.reset-password');
    }

    public function changePasswordUpdate(Request $request)
    {
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with('error', 'Password Lama Tidak Sama Dengan Yang Anda Gunakan Saat Ini');
        }
        if($request->new_password != $request->repeat_password){
            return back()->with('error', 'Password baru Dan Repeat Password Tidak Sama');
        }
        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        alert()->success('Berhasil', 'Berhasil Mereset Password');
        return back();
    }
}
