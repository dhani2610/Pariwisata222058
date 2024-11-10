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

Route::get('/', 'HomeController@redirectAdmin')->name('index');
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

    Route::group(['prefix' => 'monitoring'], function () {
        Route::get('/table-html', 'Backend\FormController@tablehtml')->name('table-html');
        Route::get('/table-html-phbs', 'Backend\FormController@tablehtmlPhbs')->name('table-html-phbs');
        Route::get('/export-data', 'Backend\FormController@export')->name('export-data');
        Route::get('/export-data-phbs', 'Backend\FormController@exportPhbs')->name('export-data-phbs');

        Route::get('/', 'Backend\FormController@index')->name('monitoring');
        Route::get('/phbs', 'Backend\FormController@phbs')->name('monitoring.phbs');
        Route::get('create', 'Backend\FormController@create')->name('monitoring.create');
        Route::post('store', 'Backend\FormController@store')->name('monitoring.store');
        Route::get('edit/{id}', 'Backend\FormController@edit')->name('monitoring.edit');
        Route::post('update/{id}', 'Backend\FormController@update')->name('monitoring.update');
        Route::get('destroy/{id}', 'Backend\FormController@destroy')->name('monitoring.destroy');
    });
    

    Route::group(['prefix' => 'wisata'], function () {
        Route::get('/', 'Backend\WisataController@index')->name('wisata');
        Route::get('/phbs', 'Backend\WisataController@phbs')->name('wisata.phbs');
        Route::get('create', 'Backend\WisataController@create')->name('wisata.create');
        Route::post('store', 'Backend\WisataController@store')->name('wisata.store');
        Route::get('edit/{id}', 'Backend\WisataController@edit')->name('wisata.edit');
        Route::post('update/{id}', 'Backend\WisataController@update')->name('wisata.update');
        Route::get('destroy/{id}', 'Backend\WisataController@destroy')->name('wisata.destroy');
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
