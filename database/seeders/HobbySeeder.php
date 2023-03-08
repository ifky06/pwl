<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobby')->insert([
            [
                'hobby'=>'Ngoding',
                'alasan'=>'Karena membuat program itu menyenangkan'
            ],[
                'hobby'=>'Menggambar',
                'alasan'=>'Karena menggambar itu bisa menghilangkan rasa bosan'
            ],[
                'hobby'=>'Mendengarkan musik',
                'alasan'=>'Karena mendengarkan musik itu bisa membuat kita lebih santai'
            ],

        ]);
    }
}
