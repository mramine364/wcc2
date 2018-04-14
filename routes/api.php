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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nearby', 'ShopController@nearby');
Route::get('preferred', 'ShopController@preferred');
Route::get('like/{shopId}', 'ShopController@like');
Route::get('unlike/{shopId}', 'ShopController@unlike');
Route::get('dislike/{shopId}', 'ShopController@dislike');
