<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
 
    // Menampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('user')->where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect('/welcome'); // ubah sesuai tujuan Anda
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    // Menampilkan form register
    public function showRegister()
    {
        return view('register');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'nim' => 'required|numeric',
            'password' => 'required|min:6',
        ]);

        DB::table('user')->insert([
            'username' => $request->username,
            'nim' => $request->nim,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Logout
    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }
}


