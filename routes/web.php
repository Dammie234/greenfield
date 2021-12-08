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

Route::get('/reset-password/{token}', 'AuthController@getPassword');
Route::post('update-password', 'AuthController@updatePassword')->name('update_password');
Route::get('/property-owner/password-updated', function () {
    return view('password-update');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

