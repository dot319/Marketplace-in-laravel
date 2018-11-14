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
    return view('welcome');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

Route::get('/home', 'HomeController@index')->name('home');

//----------------------------------------------------------------------
Route::get('/ads', 'AdController@index');
Route::get('/ads/create', 'AdController@create')->middleware('auth');
Route::post('/ads', 'AdController@store');
Route::get('/ads/{ad}', 'AdController@show');
Route::get('/ads/{ad}/edit', 'AdController@edit')->middleware('auth');
Route::patch('/ads/{ad}', 'AdController@update');
Route::delete('/ads/{ad}', 'AdController@destroy');

//----------------------------------------------------------------------
Route::get('/profiles/{user}', 'ProfileController@show');
Route::get('/profiles/{user}/edit', 'ProfileController@edit')->middleware('auth');
Route::patch('/profiles/{user}', 'ProfileController@update');