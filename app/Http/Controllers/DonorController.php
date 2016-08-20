<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;
use App\GolDarah;
use App\Pekerjaan;
use App\Http\Requests;
use App\Http\Requests\DonorTambahRequest;
use App\Http\Requests\DonorUbahRequest;
use Input;
use Session;
use Redirect;

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
        $golDarahs = GolDarah::all();
        $pekerjaans = Pekerjaan::all();
        return view('donor.tambah')->with([
            'golDarahs'=>$golDarahs,
            'pekerjaans'=>$pekerjaans,
        ]);
    }
    public function postTambah(DonorTambahRequest $valid)
    {
        if ($valid)
        {
            $data = [
                'no_register' => Input::get('no_register'),
                'nama' => Input::get('nama'),
                'gol_darah_id' => Input::get('gol_darah_id'),
                'kelamin' => Input::get('kelamin'),
                'tempat_lahir' => Input::get('tempat_lahir'),
                'tgl_lahir' => Input::get('tgl_lahir'),
                'telp' => Input::get('telp'),
                'pekerjaan_id' => Input::get('pekerjaan_id'),
            ];
            if (Input::get('alamat') != "") $data += Input::get('alamat');
            if (Input::get('rt') != "") $data += Input::get('rt');
            if (Input::get('rw') != "") $data += Input::get('rw');
            if (Input::get('kelurahan') != "") $data += Input::get('kelurahan');
            if (Input::get('kecamatan') != "") $data += Input::get('kecamatan');
            if (Input::get('kode_pos') != "") $data += Input::get('kode_pos');
            if (Input::get('penghargaan') != "") $data += Input::get('penghargaan');
            if (Input::get('total_donor') != "") $data += Input::get('total_donor');
            if (Input::get('donor_terakhir') != "") $data += Input::get('donor_terakhir');
            Donor::create($data);
            return Redirect::to('donor')->with('message',"Data ".Input::get('nama')." berhasil diinputkan!");
        }
    }
    public function getUbah()
    {
        $golDarahs = GolDarah::all();
        $pekerjaans = Pekerjaan::all();
        $donor = Donor::find(Input::get('id'));
        return view('donor.ubah')->with([
            'donor' => $donor,
            'golDarahs' => $golDarahs,
            'pekerjaans' => $pekerjaans,
        ]);
    }
    public function postUbah(DonorUbahRequest $valid)
    {
        if($valid)
        {
            $donor = Donor::find(Input::get('id'));

            $donor->no_register = Input::get('no_register');
            $donor->nama = Input::get('nama');
            $donor->gol_darah_id = Input::get('gol_darah_id');
            $donor->kelamin = Input::get('kelamin');
            $donor->tempat_lahir = Input::get('tempat_lahir');
            $donor->tgl_lahir = Input::get('tgl_lahir');
            $donor->telp = Input::get('telp');
            $donor->pekerjaan_id = Input::get('pekerjaan_id');

            if (Input::get('alamat') != "") $donor->alamat = Input::get('alamat');
            if (Input::get('rt') != "") $donor->rt = Input::get('rt');
            if (Input::get('rw') != "") $donor->rw = Input::get('rw');
            if (Input::get('kelurahan') != "") $donor->kelurahan = Input::get('kelurahan');
            if (Input::get('kecamatan') != "") $donor->kecamatan = Input::get('kecamatan');
            if (Input::get('kode_pos') != "") $donor->kode_pos = Input::get('kode_pos');
            if (Input::get('penghargaan') != "") $donor->penghargaan = Input::get('penghargaan');
            if (Input::get('total_donor') != "") $donor->total_donor = Input::get('total_donor');
            if (Input::get('donor_terakhir') != "") $donor->donor_terakhir = Input::get('donor_terakhir');

            $donor->save();

            return Redirect::to('donor')->with('message','Data '.Input::get('nama').' berhasil diubah.');
        }
    }
    public function getHapus()
    {
        $golDarahs = GolDarah::all();
        $pekerjaans = Pekerjaan::all();
        $donor = Donor::find(Input::get('id'));
        return view('donor.hapus')->with([
            'donor' => $donor,
            'golDarahs' => $golDarahs,
            'pekerjaans' => $pekerjaans,
        ]);
    }
    public function postHapus()
    {
        Donor::destroy(Input::get('id'));
        return Redirect::to('donor')->with('message','Data '.Input::get('nama').' berhasil dihapus.');
    }
}
