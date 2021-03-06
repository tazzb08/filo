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





Route::get('/', 'ItemController@index');

Auth::routes();

Route::get('request/index','ItemRequestController@index');

Route::get('request/create','ItemRequestController@create');


Route::resource('request', 'ItemRequestController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/guest', 'ItemController@index');

Route::resource('items','ItemController');
