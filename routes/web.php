<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
      return view('auth/login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index');
Route::get('/petugas', 'PetugasController@index');
Route::get('/petugas', 'PetugasController@store');
Route::resource('/petugas', 'PetugasController');
Route::get('/edit/{id}','UserController@edit');
Route::put('/updateuser/{id}','UserController@userupdate2');
Route::resource('/laporan', 'LaporanController');
Route::put('/laporan', 'LaporanController@store');
Route::get('/dashboard', 'LaporanController@dashboard');
Route::get('/laporanmasuk', 'LaporanController@laporanmasuk');
Route::get('/usermasuk', 'UserController@usermasuk');
Route::resource('/alat', 'AlatController');
Route::put('/alat', 'AlatController@store');
Route::get('/alatdamkar', 'AlatController@index');
Route::resource('/user', 'UserController');
Route::resource('/petugas', 'PetugasController');
Route::get('/cetak-laporan/{tglawal}/{tglakhir}', 'LaporanController@cetakLaporan');
Route::get('/googlemap/{id}', 'LaporanController@googlemap');
Route::get('/deleteuser/{id}', 'UserController@destroy');
Route::get('/deletepetugas/{id}', 'PetugasController@destroy');


