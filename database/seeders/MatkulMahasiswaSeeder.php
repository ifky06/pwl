<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul_mahasiswa')->insert([
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '9',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '10',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '11',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '12',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '13',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matkul_id' => '14',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '9',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '10',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '11',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '12',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '13',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2',
                'matkul_id' => '14',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '6',
                'matkul_id' => '9',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '6',
                'matkul_id' => '10',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '6',
                'matkul_id' => '11',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '6',
                'matkul_id' => '12',
                'nilai' => 'A'
            ],
        ]);
    }
}
