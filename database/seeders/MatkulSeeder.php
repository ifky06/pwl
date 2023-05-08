<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
            [
                'nama' => 'Dasar Pemrograman',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Mamluatul Hani\'ah, S.Kom., M.Kom.',
                'semester' => '1'
            ],
            [
                'nama' => 'Algoritma dan Struktur Data',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Mungki Astiningrum, ST., M.Kom.',
                'semester' => '2'
            ],
            [
                'nama' => 'Basis Data',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Elok Nur Hamdana, S.T., M.T',
                'semester' => '2'
            ],
            [
                'nama' => 'Basis Data Lanjut',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Eka Larasati Amalia, S.ST., MT.',
                'semester' => '3'
            ],
            [
                'nama' => 'Desain dan Pemrograman Web',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Dimas Wahyu Wibowo, ST., MT.',
                'semester' => '3'
            ],
            [
                'nama' => 'Pemrograman Berbasis Objek',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Elok Nur Hamdana, S.T., M.T',
                'semester' => '3'
            ],
            [
                'nama' => 'Pemrograman Web Lanjut',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Moch. Zawaruddin Abdullah, S.ST., M.Kom',
                'semester' => '4'
            ],
            [
                'nama' => 'Proyek 1',
                'sks' => '3',
                'jam' => '6',
                'nama_dosen' => 'Farid Angga Pribadi, S.Kom.,M.Kom',
                'semester' => '4'
            ]
        ]);
    }
}
