<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatkulModel;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = MatkulModel::all();
        return view('pertemuan4.matkul')
            ->with('matkul', $matkul);
    }
}
