<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('password', function(){
    return bcrypt('gunawan');
});

Route::get('/customer', 'CustomerController@index');
Route::get('/customer/{customer}', 'CustomerController@show');
Route::post('/customer', 'CustomerController@store')->name('task.store')->middleware('auth:api');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('task.destroy')->middleware('auth:api');
Route::post('/customer/{customer}', 'CustomerController@update')->name('task.update')->middleware('auth:api');

Route::get('/Lapangan', 'LapanganController@index');
Route::get('/Lapangan/{lapangan}', 'LapanganController@show');
Route::post('/Lapangan', 'LapanganController@store')->name('task.store')->middleware('auth:api');
Route::delete('/Lapangan/{lapangan}', 'LapanganController@destroy')->name('task.destroy')->middleware('auth:api');
Route::post('/Lapangan/{lapangan}', 'LapanganController@update');

Route::get('/Penyewaan', 'PenyewaanController@index');
Route::get('/Penyewaan/{penyewaan}', 'PenyewaanController@show');
Route::post('/Penyewaan', 'PenyewaanController@store');
Route::delete('/Penyewaan/{penyewaan}', 'PenyewaanController@destroy');
Route::post('/Penyewaan/{penyewaan}', 'PenyewaanController@update');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});