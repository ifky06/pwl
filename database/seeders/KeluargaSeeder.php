<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'nama'=>'Kasirin',
                'relasi'=>'Ayah'
            ],[
                'nama'=>'Tumini',
                'relasi'=>'Ibu'
            ],[
                'nama'=>'Rifki',
                'relasi'=>'Anak Pertama'
            ],[
                'nama'=>'Kenzie',
                'relasi'=>'Anak Kedua'
            ]
        ]);
    }
}
