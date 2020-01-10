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

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => ['auth','auth.admin']], function () {

    Route::get('/AdminDasboard', 'AdminDashboardController@index')->name('AdminDasboard');
    Route::resource('settings', 'SettingController');
    Route::resource('users', 'UserController');
    Route::post('settings/addRole', 'SettingController@addRole');
});


