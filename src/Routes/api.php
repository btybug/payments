<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'shopping-cart-api'], function () {
    Route::post('/add-to-cart','SoppingCartApiController@addToCart');
    Route::post('/get-cart-count','SoppingCartApiController@getCount');
    Route::post('/get-cart-content','SoppingCartApiController@getCartData');
});
