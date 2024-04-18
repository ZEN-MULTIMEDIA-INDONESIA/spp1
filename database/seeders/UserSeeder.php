<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Proyek Manager 1',
            'email' => 'pm@company.com',
            'password' => Hash::make('ZENPM1'),
            'status' => '1',
            'peran' => '0',
            'created_at' => now('Asia/Jakarta'),
        ]);

        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Direktur Produksi 1',
            'email' => 'direktur-produksi@company.com',
            'password' => Hash::make('ZENPRODUKSI1'),
            'status' => '1',
            'peran' => '1',
            'created_at' => now('Asia/Jakarta'),
        ]);

        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Direktur Keuangan 1',
            'email' => 'direktur-keuangan@company.com',
            'password' => Hash::make('ZENKEUANGAN1'),
            'status' => '1',
            'peran' => '2',
            'created_at' => now('Asia/Jakarta'),
        ]);

        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Karyawan Produksi 1',
            'email' => 'karyawan-produksi@company.com',
            'password' => Hash::make('ZENKPRODUKSI1'),
            'status' => '1',
            'peran' => '3',
            'created_at' => now('Asia/Jakarta'),
        ]);

        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Klien 1',
            'email' => 'klien@company.com',
            'password' => Hash::make('KLIEN1'),
            'status' => '1',
            'peran' => '4',
            'created_at' => now('Asia/Jakarta'),
        ]);
    }
}
