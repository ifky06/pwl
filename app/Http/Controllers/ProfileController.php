<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data=[
            'nama'=>'Ahmad Rifki Fauzi',
            'nim'=>'2141720028',
            'kelas'=>'TI-2B'
        ];
        return view('pertemuan3.praktikum2.profile')
            ->with('data',$data);
    }
}
