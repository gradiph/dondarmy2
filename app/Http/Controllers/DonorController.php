<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;
use App\Http\Requests;

class DonorController extends Controller
{
    public function read()
    {
        return view('donor.read');
    }
    public function list()
    {
        Session::put('donor_search', Input::has('ok') ? Input::get('search') : (Session::has('donor_search') ? Session::get('donor_search') : ''));
        Session::put('donor_field', Input::has('field') ? Input::get('field') : (Session::has('donor_field') ? Session::get('donor_field') : 'name'));
        Session::put('donor_sort', Input::has('sort') ? Input::get('sort') : (Session::has('donor_sort') ? Session::get('donor_sort') : 'asc'));
        $donors = Donor::where('name', 'like', '%' . Session::get('donor_search') . '%')
            ->orderBy(Session::get('donor_field'), Session::get('donor_sort'))->paginate(8);
        return view('donor.list', ['donors' => $donors]);
    }
}
