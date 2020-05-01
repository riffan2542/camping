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


Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/', 'FrontendController@index')->name('/');
Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {           

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/kategori', 'KategoriController');
Route::resource('/pengembalian', 'PengembalianController');
Route::resource('/user', 'UserController');
Route::resource('/stokbarang', 'StokbarangController');
Route::resource('/transaksi', 'TransaksiController');
Route::get('/cetak_pdf/{id}', 'TransaksiController@cetak_pdf')->name('cetak_pdf');
// Route::get('/cetak_pdf', function () {
//     $transaksi = \App\Transaksi::get();
//     $pdf = \PDF::loadView('admin.transaksi.pdf', ['transaksi' => $transaksi]);
//     return $pdf->download('data-transaksi.pdf');
// });
Route::get('laporan-pdf','HomeController@generatePDF');
Route::resource('/pemesanan', 'PemesananController');
Route::get('/option', function () {
    return view('admin.main');
});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

