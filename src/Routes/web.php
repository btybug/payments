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
Route::any('test', 'TestController@test');
Route::any('test-call-back', 'TestController@testCallBack');
Route::get('shopping-cart-table', function () {
    \BtyBugHook\Payments\Database\CreateShoppingcartTable::up();
});
Route::get('/', 'OrdersController@getList', true)->name('payments_index');
Route::post('/save-cash', 'OrdersController@saveCash')->name('order_cash');
Route::get('/save-stripe', 'OrdersController@saveStripe')->name('order_stripe');
Route::get('/edit-order/{id}', 'OrdersController@editOrder', true)->name('edit_order');
Route::get('/view-order/{id}', 'OrdersController@viewOrder', true)->name('view_order');

Route::group(['prefix' => 'shopping-cart'], function () {
    Route::get('/', 'IndexConroller@getShoppingCatr', true)->name('payments_shopping');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardConroller@getIndex', true)->name('payments_dashboard');
});

Route::group(['prefix' => 'user-payments'], function () {
    Route::get('/', 'UserPaymentsConroller@getIndex', true)->name('payments_user_payments');
});

Route::group(['prefix' => 'shopping-cart'], function () {
    Route::get('/', 'IndexConroller@getShoppingCatr', true)->name('payments_shopping');
    Route::get('/general', 'IndexConroller@getShoppingCartGeneral', true)->name('payments_sopping_cart_general');
    Route::group(['prefix' => 'zones'], function () {
        Route::get('/', 'IndexConroller@getShoppingCartZones', true)->name('payments_sopping_cart_zones');
        Route::get('/create', 'IndexConroller@getShoppingCartZonesCreate', true)->name('payments_sopping_cart_zones_create');
        Route::get('/update/{id}', 'IndexConroller@getShoppingCartZonesUpdate', true)->name('payments_sopping_cart_zones_update');
        Route::post('/update/{id}', 'IndexConroller@getShoppingCartZonesUpdateSave', true)->name('payments_sopping_cart_zones_update_save');
        Route::post('/create', 'IndexConroller@getShoppingCartZonesCreateSave', true)->name('payments_sopping_cart_zones_create_save');
    });
    Route::get('/methods', 'IndexConroller@getSoppingCartMethods', true)->name('payments_sopping_cart_methods');
});

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'PaymentSettingsConroller@getSettings', true)->name('payments_settings');
    Route::get('/general', 'PaymentSettingsConroller@getGeneral', true)->name('payments_settings_general');
    Route::post('/general/save', 'PaymentSettingsConroller@generalSave', true)->name('payments_settings_general_save');
    Route::post('/general/original/price/save', 'PaymentSettingsConroller@originalPriceSave', true)->name('payments_settings_general_original_price_save');
    Route::get('/payment-gateways', 'PaymentSettingsConroller@getPaymentGateways', true)->name('payments_settings_gatewys');
    Route::post('/payment-stripe-settings', 'PaymentSettingsConroller@postSaveStripe')->name('stripe_settings');
    Route::get('/checkout', 'PaymentSettingsConroller@getCheckout', true)->name('payments_settings_checkout');
    Route::post('/checkout', 'PaymentSettingsConroller@postCheckout')->name('payments_settings_checkout_save');
    Route::group(['prefix' => 'price'], function () {
        Route::get('/', 'PaymentSettingsConroller@getPrice', true)->name('payments_settings_price');
        Route::get('/{form}', 'PaymentSettingsConroller@getPriceForm', true)->name('payments_settings_price_form');

    });
    Route::group(['prefix' => 'shopping-cart'], function () {
        Route::get('/', 'PaymentSettingsConroller@getSoppingCart', true)->name('payments_settings_sopping_cart');
        Route::post('/manager', 'PaymentSettingsConroller@postSaveManager')->name('payments_settings_sopping_cart_manager');

    });

    Route::group(['prefix' => 'tax-services'], function () {
        Route::get('/', 'TaxServicesController@getTaxServices', true)->name('payments_settings_tax_services');
        Route::get('/create', 'TaxServicesController@getCreate', true)->name('payments_settings_tax_services_create');
        Route::post('/create', 'TaxServicesController@postCreate')->name('payments_settings_post_tax_services_create');
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', 'TaxServicesController@getEdit', true);
            Route::get('/edit', 'TaxServicesController@getEdit', true)->name('payments_settings_tax_services_edit');
            Route::get('/delete', 'TaxServicesController@getDelete', true)->name('payments_settings_tax_services_delete');
            Route::patch('/edit', 'TaxServicesController@postEdit')->name('payments_settings_post_tax_services_edit');
        });

    });
    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', 'AttributesController@getAttributes', true)->name('payments_settings_attributes');
        Route::get('/create', 'AttributesController@getAttributesCreate', true)->name('payments_settings_attributes_create');
        Route::post('/create', 'AttributesController@postAttributesCreate')->name('payments_settings_post_attributes_create');

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', 'AttributesController@getAttributesEdit', true);
            Route::get('/edit', 'AttributesController@getAttributesEdit', true)->name('payments_settings_attributes_edit');
            Route::get('/delete', 'AttributesController@getAttributesDelete', true)->name('payments_settings_attributes_delete');
            Route::patch('/edit', 'AttributesController@postAttributesEdit')->name('payments_settings_post_attributes_edit');
            Route::group(['prefix' => 'terms'], function () {
                Route::get('/', 'AttributesController@getTerms', true)->name('payments_settings_attributes_terms');
                Route::post('/', 'AttributesController@postTermCreate')->name('payments_settings_post_attributes_create');
                Route::group(['prefix' => '{term_id}'], function () {
                    Route::get('/', 'AttributesController@getTermEdit', true)->name('payments_settings_attributes_terms_edit');
                    Route::get('/edit', 'AttributesController@getTermEdit', true)->name('payments_settings_attributes_terms_edit');
                    Route::get('/delete', 'AttributesController@getTermDelete', true)->name('payments_settings_attributes_terms_delete');
                    Route::patch('/edit', 'AttributesController@postTermEdit', true)->name('payments_settings_attributes_terms_edit_post');

                });
            });
        });
    });
});


Route::group(['prefix' => 'datatable'], function () {
    Route::get('get-attributes', 'DataTablesConroller@getAttributes')->name('pym_attributes_list');
    Route::get('get-orders', 'DataTablesConroller@getOrders')->name('pym_orders_list');
    Route::get('get-tax-services', 'DataTablesConroller@getTaxServices')->name('pym_tax_services_list');
    Route::get('get-attribute-terms/{id}', 'DataTablesConroller@getAttributeTerms')->name('pym_attribute_terms');
});

Route::post('/save-quantity-price', 'PriceController@postSaveQtyPrice')->name('payments_settings_qty_save');

Route::post("/search", "IndexConroller@search");
Route::post("/findpage", "IndexConroller@findPage");
Route::post("/append-post-scroll-paginator", "IndexConroller@appendPostScrollPaginator");


Route::get('createzonetable', function(){
    \BtyBugHook\Payments\Database\CreateZonesTable::up();
});