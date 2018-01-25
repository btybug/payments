<?php
addProvider('BtyBugHook\Payments\Providers\ModuleServiceProvider');

function get_prices_data(){
    return \Config::get('payment.pricing');
}

function find_price($slug){
    $prices = get_prices_data();

    if(isset($prices[$slug])){
        return $prices[$slug];
    }

    return null;
}

//QTY functions
function get_qty_data(){
    $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();

    $settings = $settingsRepo->getSettings('pricing','qty');
    if($settings && $settings->val) return json_decode($settings->val,true);

    return null;
}

function render_price_form($view_name){
    return \View("payments::settings.price._partials.forms.$view_name")->render();
}

function render_tax_service_form($view_name){
    return \View("payments::settings.price._partials.forms.$view_name")->render();
}

function get_tax_service_data(){
    return [
        [
            'name' => 'INCLUDE Tax',
            'slug' => 'insert_tax_include',
            'group' => 'insert_tax_name',
            'form' => 'payments::settings.price._partials.forms.simple_price',
            'type' => 'radio'
        ],[
            'name' => 'EXCLUDE Tax',
            'slug' => 'insert_tax_exclude',
            'group' => 'insert_tax_name',
            'form' => 'payments::settings.price._partials.forms.simple_price',
            'type' => 'radio'
        ],[
            'name' => 'include Tax',
            'slug' => 'display_tax_include',
            'group' => 'display_tax_name',
            'form' => 'payments::settings.price._partials.forms.simple_price',
            'type' => 'radio'
        ],[
            'name' => 'exclude Tax',
            'slug' => 'display_tax_exclude',
            'group' => 'display_tax_name',
            'form' => 'payments::settings.price._partials.forms.simple_price',
            'type' => 'radio'
        ]
    ];
}