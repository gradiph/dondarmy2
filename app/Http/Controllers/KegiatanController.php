<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Http\Requests;
use App\Http\Requests\KegiatanTambahRequest;
use App\Http\Requests\KegiatanUbahRequest;
use Input;
use Session;
use Redirect;

class KegiatanController extends Controller
{
    public function getIndex()
    {
        return view('kegiatan.read');
    }
    public function getList()
    {
        Session::put('kegiatan_field', Input::has('field') ? Input::get('field') : (Session::has('kegiatan_field') ? Session::get('kegiatan_field') : 'tgl'));
        Session::put('kegiatan_sort', Input::has('sort') ? Input::get('sort') : (Session::has('kegiatan_sort') ? Session::get('kegiatan_sort') : 'desc'));
        $kegiatans = Kegiatan::orderBy(Session::get('kegiatan_field'), Session::get('kegiatan_sort'))
            ->paginate(6);
        $total = Kegiatan::count();
        return view('kegiatan.list')
            ->with('kegiatans',$kegiatans)
            ->with('total',$total);
    }
    public function getTambah()
    {
        return view('kegiatan.tambah');
    }
    public function postTambah(KegiatanTambahRequest $valid)
    {
        if ($valid)
        {
            $data = [
                'tgl' => Input::get('tgl'),
                'tempat' => Input::get('tempat'),
                'target_labu' => Input::get('target_labu'),
            ];
            Kegiatan::create($data);
            return Redirect::to('kegiatan')->with('message',"Data kegiatan tanggal ".Input::get('tgl')." berhasil diinputkan!");
        }
    }
    public function getUbah()
    {
        $kegiatan = Kegiatan::find(Input::get('id'));
        return view('kegiatan.ubah')->with('kegiatan',$kegiatan);
    }
    public function postUbah(KegiatanUbahRequest $valid)
    {
        if($valid)
        {
            $kegiatan = Kegiatan::find(Input::get('id'));

            $kegiatan->tgl = Input::get('tgl');
            $kegiatan->tempat = Input::get('tempat');
            $kegiatan->target_labu = Input::get('target_labu');
            $kegiatan->hasil_labu = Input::get('hasil_labu');
            $kegiatan->path_laporan = Input::get('path_laporan');

            $kegiatan->save();

            return Redirect::to('kegiatan')->with('message','Data kegiatan tanggal '.Input::get('tgl').' berhasil diubah.');
        }
    }
    public function getHapus()
    {
        $kegiatan = Kegiatan::find(Input::get('id'));
        return view('kegiatan.hapus')->with('kegiatan', $kegiatan);
    }
    public function postHapus()
    {
        Kegiatan::destroy(Input::get('id'));
        return Redirect::to('kegiatan')->with('message','Data kegiatan tanggal '.Input::get('tgl').' berhasil dihapus.');
    }
}
