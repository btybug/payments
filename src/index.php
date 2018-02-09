<?php
addProvider('BtyBugHook\Payments\Providers\ModuleServiceProvider');
function get_item_data_from_listener ($key)
{
    $options = \Config::get('options.listener');

    if (isset($options[$key])) return $options[$key];

    return null;
}

function get_prices_data ()
{
    return \Config::get('payment.pricing');
}

function get_data_datum ()
{
    return \Config::get('datum.options');
}

function find_price ($slug)
{
    $prices = get_prices_data();

    if (isset($prices[$slug])) {
        return $prices[$slug];
    }

    return null;
}

//QTY functions
function get_qty_data ()
{
    $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();

    $settings = $settingsRepo->getSettings('pricing', 'qty');
    if ($settings && $settings->val) return json_decode($settings->val, true);

    return null;
}

function render_price_list ()
{
    return \View("payments::settings.price.list")->render();
}

function render_price_form ($view_name)
{
    return \View("payments::settings.price._partials.forms.$view_name")->render();
}

function render_datapym_list ()
{
    
    return \View("payments::settings.datum.list")->render();
}

function render_discount_list ()
{
    return \View("payments::settings.discount.discount")->render();
}

function render_data_form ($view_name)
{
    return \View("payments::settings.price._partials.$view_name")->render();
}

function render_tax_service_form ()
{
    return 'cer u ter';
}

function render_tax_service_list ()
{
    return 'cer u ter';
}

function get_tax_service_data ()
{
    return [
        [
            'name' => 'Tax',
            'slug' => 'tax',
            'form' => '',
        ], [
            'name' => 'Services',
            'slug' => 'services',
            'form' => '',
        ]
    ];
}