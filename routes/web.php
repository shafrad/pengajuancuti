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

// Route::group(['prefix' => 'hotels'], function(){

//     Route::resource('hotels', 'HotelController');
//     Route::resource('/', 'HotelController');
//     Route::get('/', 'HotelController@index');
//     Route::get('/show/{id}', 'HotelController@show');
//     Route::get('/create', 'HotelController@create');
//     Route::post('/store', 'HotelController@store');
//     Route::get('/edit/{id}', 'HotelController@edit');
//     Route::put('/update/{id}', 'HotelController@update');
//     Route::delete('/destroy/{id}', 'HotelController@destroy');

// });

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::group(['prefix' => 'cutis'], function(){

    // Route::resource('cuti', 'CutiController');
    // Route::resource('/', 'CutiController');
    Route::get('/', 'CutiController@index')->name('cutis.index');
    Route::get('/manager', 'CutiController@index2')->name('status.index');
    Route::get('/show/{id}', 'CutiController@show')->name('cutis.show');
    Route::get('/create', 'CutiController@create')->name('cutis.create');
    Route::post('/store', 'CutiController@store')->name('cutis.store');
    Route::get('/edit/{id}', 'CutiController@edit')->name('cutis.edit');
    Route::get('/manager/edit/{id}', 'CutiController@edit2')->name('status.edit');
    Route::put('/update/{id}', 'CutiController@update')->name('cutis.update');
    Route::delete('/destroy/{id}', 'CutiController@destroy')->name('cutis.destroy');

});