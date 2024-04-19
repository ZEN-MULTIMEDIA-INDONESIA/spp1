<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
            '' => ''
        ];
        return view('utama.dashboard', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
        ];
        return view('utama.profile', $data);
    }

    public function ubah_password()
    {
        $data = [
            'title' => 'Ubah Password',
        ];
        return view('utama.ubah-password', $data);
    }

    public function ubah_password_store(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->route('profile.ubah-password')->with([
                'title' => 'Mengubah password',
                'icon' => 'error',
                'text' => 'Password lama yang diinputkan salah!'
            ]);
        } else {
            User::where('uuid', auth()->user()->uuid)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('profile')->with([
                'title' => 'Mengubah password',
                'icon' => 'success',
                'text' => 'Berhasil mengubah password!'
            ]);
        }
    }
}
