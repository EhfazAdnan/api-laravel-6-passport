<?php

use Illuminate\Http\Request;

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

// Route::get('list','Users@list');
//Route::post('login', [ 'as' => 'login', 'uses' => 'API\UserController@login']);

Route::post('login', 'API\UserController@login')->name('login');

Route::post('register', 'API\UserController@register')->name('register');

Route::group(['middleware' => 'auth:api'], function(){
   Route::post('details', 'API\UserController@details')->name('details');
   Route::post('product', 'API\Products@save')->name('product');
   Route::post('updateproduct', 'API\Products@update')->name('update');
});