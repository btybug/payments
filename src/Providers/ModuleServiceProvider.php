<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace BtyBugHook\Payments\Providers;

use Btybug\btybug\Models\Routes;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../views', 'payments');
        $this->loadViewsFrom(__DIR__ . '/../views', 'payments');

        \Eventy::action('admin.menus', [
            "title" => "Payments",
            "custom-link" => "#",
            "icon" => "fa fa-users",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Settings",
                    "custom-link" => "/admin/payments/settings",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ], [
                    "title" => "Payments",
                    "custom-link" => "/admin/payments",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Shopping cart",
                    "custom-link" => "/admin/payments/shopping-cart",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ]
            ]]);

        \Config::set('painter.PAINTERSPATHS',array_merge( \Config::get('painter.PAINTERSPATHS'),['app'.DS.'Plugins'.DS.'vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'Units']));

        Routes::registerPages('sahak.avatar/payments');
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

    }

}

