<?php

use Illuminate\Http\Request;
Use App\Hotel;
Use App\Items;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => ['api', 'cors'],
    // 'namespace' => 'App\Http\Controllers',
    'prefix' => 'v1'

], function ($router) {
    //hotels
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('hotels', 'HotelController@indexApi');
        Route::get('hotels/{id}', 'HotelController@showApi');
        Route::post('hotels', 'HotelController@storeApi');
        Route::put('hotels/{id}', 'HotelController@updateApi');
        Route::delete('hotels/{id}', 'HotelController@destroyApi');
    });
    
    
});
