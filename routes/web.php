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



Route::get('/', 'DataReaderController@show');

Route::post('/upload', 'DataReaderController@upload')->name('upload');

Route::get('/table', 'DataReaderController@index');
