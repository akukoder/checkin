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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::resource('station', 'StationController');

    Route::get('/station/{station}/generate', 'StationController@generate')
        ->name('station.generate');

    Route::get('/station/{station}/statistics', 'StationController@statistics')
        ->name('station.stats');

    Route::get('/station/{station}/export', 'AttendanceController@export')
        ->name('attendance.export');

    Route::get('/attendance/{station}/attendances', 'AttendanceController@index')
        ->name('attendance.index');

    Route::get('/settings', 'SettingController@index')
        ->name('setting.index');

    Route::post('/settings', 'SettingController@update')
        ->name('setting.update');

    Route::post('/docs', 'DocsController@index')
        ->name('docs.index');

});

Route::get('/sign-in/{station}', 'SignInController@form')->name('sign-in.view');
Route::post('/sign-in/{station}', 'SignInController@store')->name('sign-in.store');

Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

Route::view('credits', 'credits');
