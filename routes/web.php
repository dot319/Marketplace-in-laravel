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

Route::get('/home', 'HomeController@index')->name('home');

//----------------------------------------------------------------------
Route::get('/ads', 'AdController@index');
Route::get('/ads/create', 'AdController@create')->middleware('auth');
Route::post('/ads', 'AdController@store');
Route::get('/ads/{ad}', 'AdController@show');
Route::get('/ads/{ad}/edit', 'AdController@edit')->middleware('auth');
Route::patch('/ads/{ad}', 'AdController@update');


//Ads routing
//  index get /ads @index
//  show get /ads/{ad} @show
//  create get /ads/create @create
//  store post /ads @store
//  edit get /ads/{ad}/edit @edit
//  delete delete /ads/{ad} @destroy
//  update patch /ads/{ad} @update




//new
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');





