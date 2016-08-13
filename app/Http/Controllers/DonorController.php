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
    public function getIndex()
    {
        return view('donor.read');
    }
    public function getList()
    {
        Session::put('donor_search', Input::has('ok') ? Input::get('search') : (Session::has('donor_search') ? Session::get('donor_search') : ''));
        Session::put('donor_search-gol', Input::has('ok-gol') ? Input::get('search-gol') : (Session::has('donor_search-gol') ? Session::get('donor_search-gol') : ''));
        Session::put('donor_field', Input::has('field') ? Input::get('field') : (Session::has('donor_field') ? Session::get('donor_field') : 'nama'));
        Session::put('donor_sort', Input::has('sort') ? Input::get('sort') : (Session::has('donor_sort') ? Session::get('donor_sort') : 'asc'));
        $donors = Donor::where('nama', 'like', '%' . Session::get('donor_search') . '%')
            ->where('gol_darah_id', 'like', '%' . Session::get('donor_search-gol') . '%')
            ->orderBy(Session::get('donor_field'), Session::get('donor_sort'))
            ->paginate(6);
        $total = Donor::where('nama', 'like', '%' . Session::get('donor_search') . '%')
            ->where('gol_darah_id', 'like', '%' . Session::get('donor_search-gol') . '%')
            ->count();
        return view('donor.list')
            ->with('donors',$donors)
            ->with('total',$total);
    }
    public function getTambah()
    {
        return view('donor.tambah');
    }
    public function postTambah()
    {
//        $data = [
//            'no_register' => Input::get('no_register'),
//            'nama' => Input::get('nama'),
//            'gol_darah_id' => Input::get('gol_darah_id'),
//            'kelamin' => Input::get('kelamin'),
//            'tgl_lahir' => Input::get('tgl_lahir'),
//            'telp' => Input::get('telp'),
//            'pekerjaan_id' => Input::get('pekerjaan_id'),
//        ];
//        if (Input::get('alamat') != "") $data += Input::get('alamat');
//        if (Input::get('rt') != "") $data += Input::get('rt');
//        if (Input::get('rw') != "") $data += Input::get('rw');
//        if (Input::get('kelurahan') != "") $data += Input::get('kelurahan');
//        if (Input::get('kecamatan') != "") $data += Input::get('kecamatan');
//        if (Input::get('kode_pos') != "") $data += Input::get('kode_pos');
//        if (Input::get('penghargaan') != "") $data += Input::get('penghargaan');
//        if (Input::get('total_donor') != "") $data += Input::get('total_donor');
//        if (Input::get('donor_terakhir') != "") $data += Input::get('donor_terakhir');
//        $data += (Input::get('alamat') != "") ? Input::get('alamat') : null;
//        $data += (Input::get('rt') != "") ? Input::get('rt') : null;
//        $data += (Input::get('rw') != "") ? Input::get('rw') : null;
//        $data += (Input::get('kelurahan') != "") ? Input::get('kelurahan') : null;
//        $data += (Input::get('kecamatan') != "") ? Input::get('kecamatan') : null;
//        $data += (Input::get('kode_pos') != "") ? Input::get('kode_pos') : null;
//        $data += (Input::get('penghargaan') != "") ? Input::get('penghargaan') : null;
//        $data += (Input::get('total_donor') != "") ? Input::get('total_donor') : null;
//        $data += (Input::get('donor_terakhir') != "") ? Input::get('donor_terakhir') : null;
//        Donor::create($data);
        return "Data ".Input::get('nama')." berhasil diinputkan!";
    }
}
