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
    return redirect('login');
});

Auth::routes();

Route::impersonate();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resource('user', 'UserController', ['except' => ['show']])
        ->middleware('permission:manage-users');

    Route::resource('permission', 'PermissionController')
        ->middleware('permission:manage-permissions');

    Route::resource('role', 'RoleController')
        ->middleware('permission:manage-roles');

    Route::group(['middleware' => 'permission:manage-stations'], function () {
        Route::resource('station', 'StationController');

        Route::get('/station/{station}/generate', 'StationController@generate')
            ->name('station.generate');

        Route::get('/station/{station}/statistics', 'StationController@statistics')
            ->name('station.stats');
    });

    Route::group(['middleware' => 'permission:view-attendances'], function () {
        Route::get('/station/{station}/export', 'AttendanceController@export')
            ->name('attendance.export');

        Route::get('/attendance/{station}/attendances', 'AttendanceController@index')
            ->name('attendance.index');
    });

    Route::group(['middleware' => 'permission:manage-settings'], function () {
        Route::get('/settings', 'SettingController@index')
            ->name('setting.index');

        Route::post('/settings', 'SettingController@update')
            ->name('setting.update');
    });

    Route::get('/docs', 'DocsController@index')
        ->name('docs.index');

});

Route::get('/sign-in/{station}', 'SignInController@form')->name('sign-in.view');
Route::post('/sign-in/{station}', 'SignInController@store')->name('sign-in.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::view('credits', 'credits');
