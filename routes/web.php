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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontendController@index')->name('/');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/option', function () {
    return view('admin.index');
});
Route::resource('/kategori', 'KategoriController');
Route::resource('/pengembalian', 'PengembalianController');
Route::resource('/user', 'UserController');
Route::resource('/stokbarang', 'StokbarangController');
Route::resource('/transaksi', 'TransaksiController');
Route::resource('/pemesanan', 'PemesananController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
