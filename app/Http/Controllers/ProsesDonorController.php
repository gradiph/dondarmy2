<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Donor;
use App\GolDarah;
use App\Pekerjaan;
use App\DetailKegiatan;
use App\Http\Requests;
use App\Http\Requests\DonorTambahRequest;
use Input;
use Session;
use Redirect;
use DB;

class ProsesDonorController extends Controller
{
    public function getIndex()
    {
        $kegiatans = Kegiatan::orderBy('tgl','desc')->get();
        if(Session::has('sukses'))
        {
            return view('proses-donor.read-sukses')
                ->with('kegiatans',$kegiatans)
                ->with('id',Session::get('sukses'));
        }
        return view('proses-donor.read')->with('kegiatans',$kegiatans);
    }
    public function getListdonor()
    {
        Session::put('proses_search', Input::has('ok') ? Input::get('search') : (Session::has('proses_search') ? Session::get('proses_search') : ''));
        $donors = Donor::where('nama','like','%'.Session::get('proses_search').'%')->get();
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
            $details = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))
                ->orderBy('panggil','DESC')
                ->orderBy('antrian','DESC')
                ->get();
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
    public function getTerima()
    {
        $detail = DetailKegiatan::find(Input::get('detail_id'));
        $detail->terima = ($detail->terima == 'Terima') ? 'Tidak' : 'Terima';
        $detail->save();

        Session::put('proses_kegiatan', Input::has('id') ? Input::get('id') : Session::get('proses_kegiatan'));
        if (Session::get('proses_kegiatan') == "0")
        {
            return "<h4>Silakan pilih kegiatan.</h4>";
        }
        else
        {
            $details = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))
                ->orderBy('panggil','DESC')
                ->orderBy('antrian','DESC')
                ->get();
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
    public function getPanggil()
    {
        $detail = DetailKegiatan::find(Input::get('detail_id'));
        $detail->panggil = ($detail->panggil == 'Sudah') ? 'Belum' : 'Sudah';
        $detail->save();

        Session::put('proses_kegiatan', Input::has('id') ? Input::get('id') : Session::get('proses_kegiatan'));
        if (Session::get('proses_kegiatan') == "0")
        {
            return "<h4>Silakan pilih kegiatan.</h4>";
        }
        else
        {
            $details = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))
                ->orderBy('panggil','DESC')
                ->orderBy('antrian','DESC')
                ->get();
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
    public function getPilih()
    {
        $antrian = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))->max('antrian');

        $detail = DetailKegiatan::create([
            'donor_id' => Input::get('donor_id'),
            'kegiatan_id' => Session::get('proses_kegiatan'),
            'antrian' => ++$antrian,
            'panggil' => 'Belum',
            'terima' => 'Tidak',
        ]);
        return null;
    }
    public function getPrint()
    {
        $donor = Donor::find(Input::get('donor_id'));
        $kegiatan = Kegiatan::find(Session::get('proses_kegiatan'));

        return view('proses-donor.print')
            ->with('donor',$donor)
            ->with('kegiatan',$kegiatan);
    }
    public function getTambahdonor()
    {
        $golDarahs = GolDarah::all();
        $pekerjaans = Pekerjaan::all();
        return view('proses-donor.tambahDonor')->with([
            'golDarahs'=>$golDarahs,
            'pekerjaans'=>$pekerjaans,
        ]);
    }
//    public function postTambahdonor(DonorTambahRequest $valid)
    public function postTambahdonor()
    {
//        if ($valid)
//        {
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
//            if (Input::get('alamat') != "") $data += Input::get('alamat');
//            if (Input::get('rt') != "") $data += Input::get('rt');
//            if (Input::get('rw') != "") $data += Input::get('rw');
//            if (Input::get('kelurahan') != "") $data += Input::get('kelurahan');
//            if (Input::get('kecamatan') != "") $data += Input::get('kecamatan');
//            if (Input::get('kode_pos') != "") $data += Input::get('kode_pos');
//            if (Input::get('penghargaan') != "") $data += Input::get('penghargaan');
//            if (Input::get('total_donor') != "") $data += Input::get('total_donor');
//            if (Input::get('donor_terakhir') != "") $data += Input::get('donor_terakhir');
            $donor = Donor::create($data);
            return Redirect::to('proses-donor')->with('sukses',$donor->id);
//        }
    }
    public function getPilihweb()
    {
        $antrian = DetailKegiatan::where('kegiatan_id',Session::get('proses_kegiatan'))->max('antrian');

        $detail = DetailKegiatan::create([
            'donor_id' => Input::get('donor_id'),
            'kegiatan_id' => Session::get('proses_kegiatan'),
            'antrian' => ++$antrian,
            'panggil' => 'Belum',
            'terima' => 'Tidak',
        ]);
        return Redirect::to('proses-donor');
    }
    public function getYes()
    {
        $kegiatans = Kegiatan::orderBy('tgl','desc')->get();
        if(Session::has('sukses'))
        {
            return view('proses-donor.read-sukses')
                ->with('kegiatans',$kegiatans)
                ->with('id',Session::get('sukses'));
        }
        return view('proses-donor.yes')->with('kegiatans',$kegiatans);
    }
}
