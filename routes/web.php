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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('/admin/register', 'LandingPageController@register')->name('admin-register');
Route::post('/admin/register/store', 'LandingPageController@registerStore')->name('admin-register-store');

Route::get('/', 'LandingPageController@index')->name('index');
Route::get('/wisata', 'LandingPageController@wisata')->name('wisata-front');
Route::get('/tiket', 'LandingPageController@tiket')->name('tiket');
Route::get('/tiket-show/{id}', 'LandingPageController@tiketShow')->name('tiket.show');
Route::get('/wisata/{id}', 'LandingPageController@wisataDetail')->name('wisata-detail');
Route::get('/pesan-tiket/{id}', 'LandingPageController@pesanTiket')->name('pesan-tiket');
Route::get('/update-sudah-digunakan/{id}', 'LandingPageController@updateSudahDigunakan')->name('update-sudah-digunakan');
Route::post('/store-pesan-tiket/{id}', 'LandingPageController@StorepesanTiket')->name('store-pesan-tiket');
Route::get('/pembayaran/{id}', 'LandingPageController@viewPembayaran')->name('viewPembayaran');
Route::post('/processPayment/{id}', 'LandingPageController@processPayment')->name('processPayment');
Route::get('/rating/{id}', 'LandingPageController@rating')->name('rating');

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::get('admin/transaksi/invoice/{id}', 'Backend\TransaksiController@invoice')->name('transaksi.invoice');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);

    Route::group(['prefix' => 'wisata'], function () {
        Route::get('/', 'Backend\WisataController@index')->name('wisata');
        Route::get('create', 'Backend\WisataController@create')->name('wisata.create');
        Route::post('store', 'Backend\WisataController@store')->name('wisata.store');
        Route::get('edit/{id}', 'Backend\WisataController@edit')->name('wisata.edit');
        Route::post('update/{id}', 'Backend\WisataController@update')->name('wisata.update');
        Route::get('destroy/{id}', 'Backend\WisataController@destroy')->name('wisata.destroy');

        Route::get('/kelola-pesanan', 'Backend\WisataController@KelolaPesanan')->name('wisata.kelola.pesanan');
        Route::get('/update-pesanan/{id}/{status}', 'Backend\WisataController@updatePesanan')->name('wisata.update.pesanan');

    });



    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
