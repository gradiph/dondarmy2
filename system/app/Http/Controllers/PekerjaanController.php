<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use App\Http\Requests;

class PekerjaanController extends Controller
{
    public function listSelect()
    {
        $pekerjaans = Pekerjaan::all();
        return view('pekerjaan.listSelect')->with('pekerjaans',$pekerjaans);
    }
}
