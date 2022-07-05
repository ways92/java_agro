<?php

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


// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BerandaController@index');
Route::get('/produk', 'BerandaController@produk');
Route::get('/tentang', 'BerandaController@tentang');



Auth::routes();

Route::group(['middleware' => 'admin'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/history', 'HistoryController@index');
    Route::get('/history/{id}', 'HistoryController@detail');

    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.index');
    //barang
    Route::get('/admin/barang', 'BarangController@barang');
    Route::get('/admin/create-barang', 'BarangController@create');
    Route::post('/admin/store-barang', 'BarangController@store');
    Route::delete('/admin/delete-barang/{id}', 'BarangController@destroy')->name('delete-barang');
    Route::get('/admin/edit-barang/{id}', 'BarangController@edit')->name('edit-barang');
    Route::put('/admin/update-barang/{id}', 'BarangController@update')->name('update-barang');

    //slider
    Route::get('/admin/slider', 'SliderController@slider');
    Route::get('/admin/create-slider', 'SliderController@create');
    Route::post('/admin/store-slider', 'SliderController@store');
    Route::delete('/admin/delete-slider/{id}', 'SliderController@destroy')->name('delete-slider');
    Route::get('/admin/edit-slider/{id}', 'SliderController@edit')->name('edit-slider');
    Route::put('/admin/update-slider/{id}', 'SliderController@update')->name('update-slider');

    //history
    Route::get('/admin/history', 'HistoryAdminController@index');
    Route::get('/admin/history/{id}', 'HistoryAdminController@detail');
    Route::put('/admin/confirm-history/{id}', 'HistoryAdminController@bayar')->name('confirm-history');

});

Route::group(['middleware' => ['user']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pesan/{id}', 'PesanController@index');

    Route::post('/pesan/{id}', 'PesanController@pesan');

    Route::get('/check-out', 'PesanController@check_out');

    Route::delete('/check-out/{id}', 'PesanController@delete');

    Route::get('/konfirmasi-check-out', 'PesanController@konfirmasi');


    Route::get('/history', 'HistoryController@index');
    Route::get('/history/{id}', 'HistoryController@detail');

    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@update');
});


