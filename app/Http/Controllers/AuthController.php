<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
        ];
        return view('auth.login', $data);
    }

    public function credentials(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with([
                'title' => 'Login Berhasil',
                'icon' => 'success',
                'text' => 'Selamat datang di ZEN MULTIMEDIA INDONESIA, silahkan akses menu yang tersedia!'
            ]);
        } else {
            return redirect()->route('login')->with([
                'title' => 'Login Gagal',
                'icon' => 'error',
                'text' => 'Email atau password yang diinputkan salah!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with([
            'title' => 'Logout Berhasil',
            'icon' => 'success',
            'text' => 'Sampai jumpa, login kembali untuk memulai sesi!'
        ]);
    }
}
