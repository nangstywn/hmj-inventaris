<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\KategoriController;
// use App\Http\Controllers\InventarisController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\PeminjamanController;
// use App\Http\Controllers\PeminjamanDetailController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PinjamController;



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
    return view('coba');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home-ti', 'HomeController@index')->name('home.ti');
// Route::get('/home-si', 'HomeController@index')->name('home.si');
// Route::get('/home-tk', 'HomeController@index')->name('home.tk');
// Route::get('/home-mi', 'HomeController@index')->name('home.mi');
// Route::get('/home-ka', 'HomeController@index')->name('home.ka');
//Route::get('/admin', 'AdminController@index');
//Route::get('/user', 'UserController@index');

//Route::group(['middleware' => ['auth','ceklevel:admin,user']], function(){
Route::resource("admin-category", "KategoriController");
Route::resource("admin-inventory", "InventarisController")->except('index');
Route::get("admin-inventory-ti", "InventarisController@index")->name('ti.index');
Route::get("admin-inventory-si", "InventarisController@index")->name('si.index');
Route::get("admin-inventory-tk", "InventarisController@index")->name('tk.index');
Route::get("admin-inventory-mi", "InventarisController@index")->name('mi.index');
Route::get("admin-inventory-ka", "InventarisController@index")->name('ka.index');
//Route::get("admin-inventory/destroy/{id}","InventarisController@destroy");
Route::resource("peminjam", "PeminjamanController")->except('index');
Route::get("peminjam-ti", "PeminjamanController@index")->name('ti.pinjam.index');
Route::get("peminjam-si", "PeminjamanController@index")->name('si.pinjam.index');
Route::get("peminjam-tk", "PeminjamanController@index")->name('tk.pinjam.index');
Route::get("peminjam-mi", "PeminjamanController@index")->name('mi.pinjam.index');
Route::get("peminjam-ka", "PeminjamanController@index")->name('ka.pinjam.index');

Route::get("peminjam/filter", "PeminjamanController@filter")->name('peminjam.filter');
//});
Route::group(['middleware' => ['auth', 'ceklevel:admin-ti,admin-si']], function () {

    Route::get('peminjam/acc-pinjam/{id}', 'PeminjamanController@acceptPinjam')->name('peminjam.acceptPinjam');
    Route::get('peminjam/dec-pinjam/{id}', 'PeminjamanController@tolakPinjam')->name('peminjam.tolakPinjam');
    Route::get('peminjam/kembali/{id}', 'PeminjamanController@kembali')->name('peminjam.kembali');
    Route::get('peminjam/tolak-kembali/{id}', 'PeminjamanController@tolakKembali')->name('peminjam.tolakKembali');
});
Route::get('peminjam/req-kembali/{id}', 'PeminjamanController@requestKembali')->name('peminjam.requestKembali');
Route::resource('transaksi', 'PeminjamanDetailController')
    ->except('create', 'show', 'edit');
Route::get('transaksi/create/{id}', 'PeminjamanDetailController@create')->name('transaksi.create');

Route::get('pinjam/{id}', 'PinjamController@pinjam')->name('pinjam.buku');
Route::post('pinjam/notif', 'PinjamController@readOrder')->name('pinjam.notif');
Route::get('product', 'ProductController@index')->name('product.index');


Route::get('logout', 'Auth\LoginController@logout'); //hapus data
Route::get('kawal-corona', 'InventarisController@kawalCorona')->name('apis.kawal_corona');