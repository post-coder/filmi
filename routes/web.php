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

Route::get('/', 'MovieController@index')->name('index');
//only authenticated users can add movies
Route::get('/add', 'MovieController@create')->name('movie.create')->middleware('auth');
Route::post('/store', 'MovieController@store')->name('movie.store')->middleware('auth');
Route::get('/edit/{movie}', 'MovieController@edit')->name('movie.edit')->middleware('auth');
Route::post('/update/{movie}', 'MovieController@update')->name('movie.update')->middleware('auth');

Route::get('/delete/{movie}', 'MovieController@delete')->name('movie.delete')->middleware('auth');
Route::delete('/destroy/{movie}', 'MovieController@destroy')->name('movie.destroy')->middleware('auth');


Route::get('/seeMovie/{movie}', 'MovieController@seeMovie')->name('movie.see')->middleware('auth');
Route::get('/unseeMovie/{movie}', 'MovieController@unseeMovie')->name('movie.unsee')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

