<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraan')->insert([
            [
                'nopol'=>'AE 1999 A',
                'merk'=>'Toyota',
                'jenis'=>'Avanza',
                'tahun_buat'=>2010,
                'warna'=>'hitam'
            ],[
                'nopol'=>'N 169 AA',
                'merk'=>'Redbull',
                'jenis'=>'RBPT',
                'tahun_buat'=>2023,
                'warna'=>'hitam'
            ],[
                'nopol'=>'AG 86 UWU',
                'merk'=>'Ferrari',
                'jenis'=>'FS2023',
                'tahun_buat'=>2023,
                'warna'=>'merah'
            ],
        ]);
    }
}
