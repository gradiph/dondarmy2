<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('donor');
});
Route::get('donor', 'DonorController@read');
Route::get('donor/list','DonorController@list');
Route::get('donor/dialog/tambah','DonorController@dialogTambah');
Route::get('donor/dialog/ubah/{id}','DonorController@dialogUbah');
Route::get('donor/dialog/hapus/{id}','DonorController@dialogHapus');
