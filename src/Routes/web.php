<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Sahak
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'IndexConroller@getPayments', true)->name('payments_index');
Route::group(['prefix' => 'shopping-cart'], function () {
    Route::get('/', 'IndexConroller@getShoppingCatr', true)->name('payments_shopping');
});
Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'PaymentSettingsConroller@getSettings', true)->name('payments_settings');
    Route::get('/general', 'PaymentSettingsConroller@getGeneral', true)->name('payments_settings_general');
    Route::get('/payment-gateways', 'PaymentSettingsConroller@getPaymentGateways', true)->name('payments_settings_gatewys');
});

