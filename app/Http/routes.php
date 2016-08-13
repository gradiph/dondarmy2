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
Route::post('donor/tambah','DonorController@prosesTambah');

Route::get('golDarah/listSelect','GolDarahController@listSelect');

Route::get('pekerjaan/listSelect','PekerjaanController@listSelect');
