<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function register()
    {
        return view('/register');
    }
    function register_admin()
    {
        return view('register_admin');
    }

    function register_submit(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'nohp' => 'required|string|max:15|regex:/^08[0-9]{8,12}$/',
            'username' => 'required|string|max:25|unique:users,username',
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:4',
        ], [
            'username.unique' => 'Username Anda Telah Digunakan',
            'password.min' => 'Password Minimal 4 Digit',
            'nohp.required' => 'Nomor HP wajib diisi',
            'nohp.regex' => 'Nomor HP harus dimulai dengan 08 dan 10-13 digit',
        ]);



        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;

        $user->save();
        return redirect('login')->with('sukses', 'Anda Berhasil Daftar');
    }

    function login()
    {
        return view('login');
    }

    function login_submit(Request $request)
    {
        $data = $request->only('username', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('sukses', 'Berhasil Login');
        }

        return redirect('/login')->with('gagal', 'Username atau Password anda salah');
    }

    function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
