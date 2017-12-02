<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\UserTambahRequest;
use App\Http\Requests\UserUbahRequest;
use Input;
use Session;
use Redirect;
use Storage;

class UserController extends Controller
{
    public function getIndex()
    {
        return view('user.read');
    }
    public function getList()
    {
        Session::put('user_search', Input::has('ok') ? Input::get('search') : (Session::has('user_search') ? Session::get('user_search') : ''));
        Session::put('user_field', Input::has('field') ? Input::get('field') : (Session::has('user_field') ? Session::get('user_field') : 'nama'));
        Session::put('user_sort', Input::has('sort') ? Input::get('sort') : (Session::has('user_sort') ? Session::get('user_sort') : 'asc'));
        $users = User::where('nama', 'like', '%' . Session::get('user_search') . '%')
            ->orderBy(Session::get('user_field'), Session::get('user_sort'))
            ->paginate(6);
        $total = User::where('nama', 'like', '%' . Session::get('user_search') . '%')
            ->count();
        return view('user.list')
            ->with('users',$users)
            ->with('total',$total);
    }
    public function getTambah()
    {
        return view('user.tambah');
    }
    public function postTambah(UserTambahRequest $valid)
    {
        if ($valid)
        {
            $data = [
                'nama' => Input::get('nama'),
                'username' => Input::get('username'),
                'password' => bcrypt(Input::get('password')),
                'role' => Input::get('role'),
            ];
            User::create($data);
            return Redirect::to('admin/user')->with('message',"Data ".Input::get('nama')." berhasil diinputkan!");
        }
    }
    public function getUbah()
    {
        $user = User::find(Input::get('id'));
        return view('user.ubah')->with('user',$user);
    }
    public function postUbah(UserUbahRequest $valid)
    {
        if($valid)
        {
            $user = User::find(Input::get('id'));

            $user->nama = Input::get('nama');
            $user->username = Input::get('username');
            $user->role = Input::get('role');

            if(Input::get('password') != '')
            {
                $user->password = bcrypt(Input::get('password'));
            }

            $user->save();

            return Redirect::to('admin/user')->with('message','Data '.Input::get('nama').' berhasil diubah.');
        }
    }
    public function getHapus()
    {
        $user = User::find(Input::get('id'));
        return view('user.hapus')->with('user', $user);
    }
    public function postHapus()
    {
        User::destroy(Input::get('id'));
        return Redirect::to('admin/user')->with('message','Data '.Input::get('nama').' berhasil dihapus.');
    }
}
