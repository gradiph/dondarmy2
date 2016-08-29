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

Route::get('', function () {
    return Redirect::to('proses-donor');
});

Route::get('golDarah/listSelect','GolDarahController@listSelect');

Route::get('pekerjaan/listSelect','PekerjaanController@listSelect');

Route::controller('donor','DonorController');
Route::controller('kegiatan','KegiatanController');
Route::controller('user','UserController');
Route::controller('proses-donor','ProsesDonorController');
Route::controller('semoga','SemogaController');
