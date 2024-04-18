<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KlienController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
            'kliens' => User::where([['peran', '4'], ['deleted_at', null]])->get()->all()
        ];
        return view('klien.index', $data);
    }

    public function restorasi()
    {
        $data = [
            'title' => 'Restorasi Data Klien',
            'kliens' => User::where([['peran', '4'], ['deleted_at', '!=', null]])->orderBy('deleted_at', 'desc')->get()->all()
        ];
        return view('klien.restorasi', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Klien',
        ];
        return view('klien.tambah', $data);
    }

    public function edit($uuid)
    {
        $data = [
            'title' => 'Edit Data Klien',
            'klien' => User::where('uuid', $uuid)->first()
        ];
        return view('klien.edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
        ]);

        User::insert([
            'uuid' => uuid_create(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'foto' => null,
            'status' => '1',
            'peran' => '4',
            'created_at' => now('Asia/Jakarta'),
        ]);
        return redirect()->route('klien')->with([
            'title' => 'Menambahkan data',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data klien'
        ]);
    }

    public function update(Request $request, $uuid)
    {
        User::where('uuid', $uuid)->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('klien')->with([
            'title' => 'Mengubah data',
            'icon' => 'success',
            'text' => 'Berhasil mengubah data klien'
        ]);
    }

    public function hapus($uuid)
    {
        User::where('uuid', $uuid)->update([
            'status' => '0',
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return response()->json([
            'title' => 'Menghapus data',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data klien'
        ]);
    }

    public function restore($uuid)
    {
        User::where('uuid', $uuid)->update([
            'status' => '1',
            'deleted_at' => null,
        ]);
        return response()->json([
            'title' => 'Restorasi data klien',
            'icon' => 'success',
            'text' => 'Berhasil merestorasi data klien'
        ]);
    }

    public function hapus_permanen($uuid)
    {
        User::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Menghapus data permanen',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data klien secara permanen'
        ]);
    }
}
