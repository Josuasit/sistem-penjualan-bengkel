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

//Route::get('/', function () {
  //  return view('welcome');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('pesan/{id}', 'pesancontroller@index');  
Route::post('pesan/{id}', 'pesancontroller@pesan');
Route::get('check-out', 'pesancontroller@check_out');
Route::delete('check-out/{id}', 'pesancontroller@delete');

Route::get('konfirmasi-check-out', 'pesancontroller@konfirmasi');

Route::get('profile', 'profilecontroller@index');
Route::post('profile', 'profilecontroller@update');

Route::get('history', 'historycontroller@index');
Route::get('history/{id}', 'historycontroller@detail');

Route::get('/search', 'HomeController@search')->name('home.search');


Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');

	Route::get('/', 'AdminController@index')->name('admin.index');  


});
	Route::get('/', 'AdminController@index')->name('admin.dashboard.index');


Route::get('tambah-produk','AdminController@tambah');
Route::post('store','AdminController@store');
Route::get('hapus/{id}', 'AdminController@hapus');
Route::get('edit/{id}', 'AdminController@edit');
Route::post('update', 'AdminController@update')->name('update');
Route::post('upload', 'AdminController@upload');


Route::resource('user', 'UserController');
Route::get('user', 'UserController@index');
Route::post('kelola_pesanan/{id}', 'UserController@kelola');
Route::get('hapus/{id}', 'UserController@delete');

Route::resource('kategori', 'KategoriController');
Route::get('create', 'KategoriController@create');
Route::get('edit', 'KategoriController@edit');
Route::get('create', 'KategoriController@create');




 





