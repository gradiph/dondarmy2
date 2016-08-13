<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GolDarah;
use App\Http\Requests;

class GolDarahController extends Controller
{
    public function listSelect()
    {
        $golDarahs = GolDarah::all();
        return view('golDarah.listSelect')->with('golDarahs',$golDarahs);
    }
}
