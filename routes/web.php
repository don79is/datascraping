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

Route::get('/scrap',['as' => 'app.scrap.index','uses' => 'DDGrabingController@index']);
Route::get('/alldata',['as' => 'app.alldata.index','uses' => 'DDGrabingController@alldata']);
Route::get('/grab',['as' => 'app.grab.index','uses' => 'SASController@index']);