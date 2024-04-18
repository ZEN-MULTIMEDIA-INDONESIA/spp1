<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProyekController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Proyek Dashboard',
            'proyek' => Proyek::where('deleted_at', null)->orderBy('id', 'desc')->get()->all()
        ];
        return view('proyek.index', $data);
    }

    public function restorasi()
    {
        $data = [
            'title' => 'Restorasi Data Proyek',
            'proyek' => Proyek::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->get()->all()
        ];
        return view('proyek.restorasi', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Proyek',
            'klien' => User::where('peran', '4')->get()->all()
        ];
        return view('proyek.tambah', $data);
    }

    public function edit($uuid)
    {
        $data = [
            'title' => 'Edit Proyek',
            'proyek' => Proyek::where('uuid', $uuid)->first(),
            'klien' => User::where('peran', '4')->get()->all()
        ];
        return view('proyek.edit', $data);
    }

    public function detail($uuid)
    {
        $data = [
            'title' => 'Detail Proyek',
            'proyek' => Proyek::where('uuid', $uuid)->first()
        ];
        return view('proyek.detail', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_uang_muka' => 'max:4194',
            'file_pendukung' => 'max:10485'
        ]);
        $foto_uang_muka = $request->file('foto_uang_muka') ? $request->file('foto_uang_muka')->store('bukti_pembayaran') : null;
        $file_pendukung = $request->file('file_pendukung') ? $request->file('file_pendukung')->store('file_pendukung') : null;
        Proyek::insert([
            'uuid' => uuid_create(),
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis_proyek' => $request->jenis_proyek,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_tenggat' => $request->tanggal_tenggat,
            'uang_muka' => $request->uang_muka,
            'foto_uang_muka' => $foto_uang_muka,
            'biaya' => $request->biaya,
            'file_pendukung' => $file_pendukung,
            'created_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('proyek')->with([
            'icon' => 'success',
            'title' => 'Menambahkan Data',
            'text' => "Berhasil menambahkan data proyek baru"
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $proyek = Proyek::where('uuid', $uuid)->first();
        $request->validate([
            'file_uang_muka' => 'max:4194',
            'file_pendukung' => 'max:10485'
        ]);
        $file_pendukung = $request->file('file_pendukung');
        if ($file_pendukung) {
            $file_pendukung = $file_pendukung->store('file_pendukung');
            if ($proyek->file_pendukung) unlink('storage/' . $proyek->file_pendukung);
        } else {
            $file_pendukung = $proyek->file_pendukung;
        }
        $foto_uang_muka = $request->file('foto_uang_muka');
        if ($foto_uang_muka) {
            $foto_uang_muka = $foto_uang_muka->store('file_uang_muka');
            if ($proyek->foto_uang_muka) unlink('storage/' . $proyek->foto_uang_muka);
        } else {
            $foto_uang_muka = $proyek->foto_uang_muka;
        }
        Proyek::where('uuid', $uuid)->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_tenggat' => $request->tanggal_tenggat,
            'biaya' => $request->biaya,
            'foto_uang_muka' => $foto_uang_muka,
            'uang_muka' => $request->uang_muka,
            'file_pendukung' => $file_pendukung,
            'updated_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('proyek')->with([
            'icon' => 'success',
            'title' => 'Mengedit Data',
            'text' => "Berhasil mengubah data proyek"
        ]);
    }

    public function hapus($uuid)
    {
        Proyek::where('uuid', $uuid)->update([
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return response()->json([
            'title' => 'Menghapus data',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data proyek'
        ]);
    }

    public function restore($uuid)
    {
        Proyek::where('uuid', $uuid)->update([
            'deleted_at' => null,
        ]);
        return response()->json([
            'title' => 'Restorasi data proyek',
            'icon' => 'success',
            'text' => 'Berhasil merestorasi data proyek'
        ]);
    }

    public function hapus_permanen($uuid)
    {
        Proyek::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Menghapus data permanen',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data proyek secara permanen'
        ]);
    }
}
