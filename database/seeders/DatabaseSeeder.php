<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create(['username' => 'admin', 'password' => 'admin123']);

        Siswa::create(['nis' => 1234567890, 'kelas' => 'XII RPL 1']);

        foreach (['Ruang Kelas', 'Toilet', 'Laboratorium', 'Lapangan'] as $ket) {
            Kategori::create(['ket_kategori' => $ket]);
        }
    }
}