<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Redirect;
use Input;

class LoginController extends Controller
{
    public function getIndex()
    {
        if(Auth::user())
        {
            return Redirect::to('');
        }
        else
        {
            return view('auth.login');
        }
    }
    public function postIndex()
    {
        if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')],Input::get('remember'))) {
			return Redirect::to('');
		}
		else {
			return Redirect::to('login')->with('message','salah username atau salah password')->with('type','label-danger');
		}
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('login')->with([
            'message' => 'Logout berhasil',
            'type' => 'label-success',
        ]);
    }
}
