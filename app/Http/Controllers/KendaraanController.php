<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use Illuminate\Http\Request;


class KendaraanController extends Controller
{
    public function index(){
        $kendaraan = KendaraanModel::all();
        return view('pertemuan4.kendaraan')
            ->with('kendaraan', $kendaraan);
    }
}
