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
