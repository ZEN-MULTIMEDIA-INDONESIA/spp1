<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            'uuid' => uuid_create(),
            'nama' => 'Pembuatan Aplikasi Android & IOS',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere laboriosam tempore nam mollitia voluptas autem quae? Aperiam explicabo voluptatem aut soluta quibusdam fugit sapiente nulla est incidunt accusamus, reprehenderit ex maiores, doloribus iusto asperiores ad, deleniti molestias hic. Similique ipsam consequatur porro nobis, qui sit odit sint illo in magni!',
            'icon' => '<i class="fa-solid fa-mobile-screen-button"></i>',
            'created_at' => now()
        ]);
        Service::insert([
            'uuid' => uuid_create(),
            'nama' => 'Pembuatan Website',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere laboriosam tempore nam mollitia voluptas autem quae? Aperiam explicabo voluptatem aut soluta quibusdam fugit sapiente nulla est incidunt accusamus, reprehenderit ex maiores, doloribus iusto asperiores ad, deleniti molestias hic. Similique ipsam consequatur porro nobis, qui sit odit sint illo in magni!',
            'icon' => '<i class="fa-solid fa-display"></i>',
            'created_at' => now()
        ]);
        Service::insert([
            'uuid' => uuid_create(),
            'nama' => 'Pembuatan Robot Trading',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere laboriosam tempore nam mollitia voluptas autem quae? Aperiam explicabo voluptatem aut soluta quibusdam fugit sapiente nulla est incidunt accusamus, reprehenderit ex maiores, doloribus iusto asperiores ad, deleniti molestias hic. Similique ipsam consequatur porro nobis, qui sit odit sint illo in magni!',
            'icon' => '<i class="fa-solid fa-money-bill-trend-up"></i>',
            'created_at' => now()
        ]);
        Service::insert([
            'uuid' => uuid_create(),
            'nama' => 'Pembuatan Animasi Explainer',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere laboriosam tempore nam mollitia voluptas autem quae? Aperiam explicabo voluptatem aut soluta quibusdam fugit sapiente nulla est incidunt accusamus, reprehenderit ex maiores, doloribus iusto asperiores ad, deleniti molestias hic. Similique ipsam consequatur porro nobis, qui sit odit sint illo in magni!',
            'icon' => '<i class="fa-solid fa-pencil"></i>',
            'created_at' => now()
        ]);
        Service::insert([
            'uuid' => uuid_create(),
            'nama' => 'Layanan Jasa Multimedia',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere laboriosam tempore nam mollitia voluptas autem quae? Aperiam explicabo voluptatem aut soluta quibusdam fugit sapiente nulla est incidunt accusamus, reprehenderit ex maiores, doloribus iusto asperiores ad, deleniti molestias hic. Similique ipsam consequatur porro nobis, qui sit odit sint illo in magni!',
            'icon' => '<i class="fa-solid fa-clapperboard"></i>',
            'created_at' => now()
        ]);
    }
}
