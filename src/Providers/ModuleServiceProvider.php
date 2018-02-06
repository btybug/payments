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
use BtyBugHook\Payments\Database\CreatePayInvoiceTable;
use BtyBugHook\Payments\Models\User;
use Cartalyst\Stripe\Stripe;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot ()
    {
        \Eventy::addAction('options.listener', function ($what) {
            $options = \Config::get('options.listener', []);
            $options[$what['name']] = $what;
            \Config::set('options.listener', $options);
            return (\Config::get('options.listener'));
        });

//        CreatePayInvoiceTable::up();
//        CreatePayInvoiceTable::up();
        $settingsPath = storage_path('app' . DS . 'payments.json');
        if (\File::exists($settingsPath)) {
            $settings = json_decode(\File::get($settingsPath), true);
            \Config::set('services.stripe', isset($settings['stripe']) ? $settings['stripe'] : null);
        }
        \Eventy::action('payment.pricing',
            [
                'name'     => 'Simple price',
                'slug'     => 'simple_price',
                'form'     => 'payments::settings.price._partials.forms.simple_price',
                'settings' => 'payments::settings.price._partials.settings.simple_price',
            ]);

        \Eventy::action('payment.pricing',
            [
                'name'     => 'Quantity price',
                'slug'     => 'quantity_price',
                'form'     => 'payments::settings.price._partials.forms.quantity_price',
                'settings' => 'payments::settings.price._partials.settings.quantity_price',
            ]);

        \Eventy::action('payment.pricing',
            [
                'name'     => 'Attributes price',
                'slug'     => 'price_attributes',
                'form'     => 'payments::settings.price._partials.forms.price_attributes',
                'settings' => 'payments::settings.price._partials.settings.price_attributes',
            ]);

        \Eventy::action('payment.pricing',
            [
                'name'     => 'Size based',
                'slug'     => 'size_based',
                'form'     => 'payments::settings.price._partials.forms.size_based',
                'settings' => 'payments::settings.price._partials.settings.size_based',
            ]);

        $this->app->register(\Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class);
        $this->app->register(\Cartalyst\Stripe\Laravel\StripeServiceProvider::class);
        //  \Config::set('app.aliases', array_merge(\Config::get('app.aliases'), ['Cart' => Gloudemans\Shoppingcart\Facades\Cart::class]));
        \Config::set('cart', [
            'tax'               => 21,
            'database'          => [
                'connection' => null,
                'table'      => 'shoppingcart',
            ],
            'destroy_on_logout' => false,
            'format'            => [
                'decimals'           => 2,
                'decimal_point'      => '.',
                'thousand_seperator' => ','
            ],
        ]);

        \Eventy::action('options.listener',
            [
                'name'             => 'price',
                'render_function'  => 'render_price_form',
                'options_function' => 'get_prices_data'
            ]
        );
        \Eventy::action('options.listener',
            [
                'name'             => 'tax_services',
                'render_function'  => 'render_tax_service_form',
                'options_function' => 'get_tax_service_data',
                'tab'              => 'others'
            ]
        );

        $tabs = [
            'payment_settings' => [
                [
                    'title' => 'General',
                    'url'   => '/admin/payments/settings/general',
                    'icon'  => 'fa fa-cub'
                ],
                [
                    'title' => 'Payment gateways',
                    'url'   => '/admin/payments/settings/payment-gateways',
                    'icon'  => 'fa fa-cub'
                ], [
                    'title' => 'Checkout',
                    'url'   => '/admin/payments/settings/checkout',
                    'icon'  => 'fa fa-cub'
                ], [
                    'title' => 'Attributes',
                    'url'   => '/admin/payments/settings/attributes',
                    'icon'  => 'fa fa-cub'
                ], [
                    'title' => 'Price',
                    'url'   => '/admin/payments/settings/price',
                    'icon'  => 'fa fa-cub'
                ], [
                    'title' => 'Shopping Cart',
                    'url'   => '/admin/payments/settings/sopping-cart',
                    'icon'  => 'fa fa-cub'
                ], [
                    'title' => 'Tax & services',
                    'url'   => '/admin/payments/settings/tax-services',
                    'icon'  => 'fa fa-cub'
                ],
            ]
        ];
        \Eventy::action('my.tab', $tabs);

        $this->loadTranslationsFrom(__DIR__ . '/../views', 'payments');
        $this->loadViewsFrom(__DIR__ . '/../views', 'payments');

        \Eventy::action('admin.menus', [
            "title"       => "Payments",
            "custom-link" => "#",
            "icon"        => "fa fa-users",
            "is_core"     => "yes",
            "children"    => [
                [
                    "title"       => "Dashboard",
                    "custom-link" => "/admin/payments/dashboard",
                    "icon"        => "fa fa-angle-right",
                    "is_core"     => "yes"
                ], [
                    "title"       => "User payments",
                    "custom-link" => "/admin/payments/user-payments",
                    "icon"        => "fa fa-angle-right",
                    "is_core"     => "yes"
                ],
                [
                    "title"       => "Settings",
                    "custom-link" => "/admin/payments/settings",
                    "icon"        => "fa fa-angle-right",
                    "is_core"     => "yes"
                ], [
                    "title"       => "Payments",
                    "custom-link" => "/admin/payments",
                    "icon"        => "fa fa-angle-right",
                    "is_core"     => "yes"
                ], [
                    "title"       => "Shopping cart",
                    "custom-link" => "/admin/payments/shopping-cart",
                    "icon"        => "fa fa-angle-right",
                    "is_core"     => "yes"
                ]
            ]]);

        \Config::set('painter.PAINTERSPATHS', array_merge(\Config::get('painter.PAINTERSPATHS'), ['app' . DS . 'Plugins' . DS . 'vendor' . DS . 'sahak.avatar' . DS . 'payments' . DS . 'src' . DS . 'Units']));

        Routes::registerPages('sahak.avatar/payments');
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register ()
    {

        \Eventy::addAction('payment.pricing', function ($what) {
            $codes = \Config::get('payment.pricing', []);
            $codes[$what['slug']] = [
                'name'     => $what['name'],
                'slug'     => $what['slug'],
                'form'     => $what['form'],
                'settings' => $what['settings'],
            ];
            \Config::set('payment.pricing', $codes);

            return (\Config::get('payment.pricing'));
        });

        $this->app->register(RouteServiceProvider::class);

    }

}

