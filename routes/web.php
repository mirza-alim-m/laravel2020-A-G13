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

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth','middleware'=>'verified'], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');

    Route::get('change-password', 'ChangePasswordController@index');
	Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

});