<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Donor;
use App\DetailKegiatan;
use App\Http\Requests;
use Input;
use Session;
use Redirect;

class ProsesDonorController extends Controller
{
    public function getIndex()
    {
        $kegiatans = Kegiatan::orderBy('tgl','desc')->get();
        return view('proses-donor.read')->with('kegiatans',$kegiatans);
    }
    public function getListdonor()
    {
        Session::put('proses_search', Input::has('ok') ? Input::get('search') : (Session::has('proses_search') ? Session::get('proses_search') : ''));
        $donors = Donor::where('nama', 'like', '%' . Session::get('proses_search') . '%')
            ->orderBy('nama', 'asc')
            ->paginate(6);
        return view('proses-donor.listDonor')
            ->with('donors',$donors);
    }
    public function getListantrian()
    {
        Session::put('proses_kegiatan', Input::has('id') ? Input::get('id') : Session::get('proses_kegiatan'));
        if (Session::get('proses_kegiatan') == "0")
        {
            return "<h4>Silakan pilih kegiatan.</h4>";
        }
        else
        {
            $details = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))->get();
            if(count($details) > 0)
            {
                return view('proses-donor.listAntrian')->with('details',$details);
            }
            else
            {
                return "<h4>Data kosong.</h4>";
            }
        }
    }
}
