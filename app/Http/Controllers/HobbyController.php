<?php

namespace App\Http\Controllers;

use App\Models\HobbyModel;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function index()
    {
        $hobby = HobbyModel::all();
        return view('pertemuan4.hobby' )
            ->with('hobby', $hobby);
    }
}
