<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;
use App\GolDarah;
use App\Http\Requests;
use Input;
use Session;

class DonorController extends Controller
{
    public function read()
    {
        return view('donor.read');
    }
    public function list()
    {
        Session::put('donor_search', Input::has('ok') ? Input::get('search') : (Session::has('donor_search') ? Session::get('donor_search') : ''));
        Session::put('donor_search-gol', Input::has('ok-gol') ? Input::get('search-gol') : (Session::has('donor_search-gol') ? Session::get('donor_search-gol') : ''));
        Session::put('donor_field', Input::has('field') ? Input::get('field') : (Session::has('donor_field') ? Session::get('donor_field') : 'nama'));
        Session::put('donor_sort', Input::has('sort') ? Input::get('sort') : (Session::has('donor_sort') ? Session::get('donor_sort') : 'asc'));
        $donors = Donor::where('nama', 'like', '%' . Session::get('donor_search') . '%')
            ->where('gol_darah_id', 'like', '%' . Session::get('donor_search-gol') . '%')
            ->orderBy(Session::get('donor_field'), Session::get('donor_sort'))
            ->paginate(6);
        $total = Donor::count();
        return view('donor.list')
            ->with('donors',$donors)
            ->with('total',$total);
    }
    public function dialogTambah()
    {
        return view('donor.dialog_tambah');
    }
    public function dialogUbah($id)
    {
        $donor = Donor::find($id);
        return view('donor.dialog_ubah')
            ->with('donor',$donor);
    }
    public function dialogHapus($id)
    {
        $donor = Donor::find($id);
        return view('donor.dialog_ubah')
            ->with('donor',$donor);
    }
}
