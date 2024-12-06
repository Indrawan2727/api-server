<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::post('loginp', 'Api\PetugasController@loginp');
Route::post('registerp', 'Api\PetugasController@registerp');
Route::post('update/{id}', 'Api\UserController@update');
Route::post('store', 'Api\LaporanController@store');
Route::get('laporan', 'Api\LaporanController@index');
Route::get('update', 'Api\LaporanController@update');
Route::get('history/user/{id}', 'Api\LaporanController@history');
Route::post('updateL/{id}', 'Api\LaporanController@update');
Route::post('updatestatus/{id}', 'Api\LaporanController@updateselesai');
Route::post('update1/{id}', 'Api\LaporanController@update1');
Route::post('updatestatus/{id}', 'Api\UserController@updatestatus');
