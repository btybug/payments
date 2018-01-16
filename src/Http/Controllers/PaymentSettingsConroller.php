<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;

class PaymentSettingsConroller extends Controller
{
    public function getSettings()
    {
        return view('payments::settings.index');
    }

    public function getGeneral()
    {
        return view('payments::settings.general');
    }

    public function getCheckout()
    {
        return view('payments::settings.checkout');
    }

    public function getAttributes()
    {
        return view('payments::settings.attributes');
    }

    public function getPrice()
    {
        $prices = get_prices_data();
        return view('payments::settings.price',compact(['prices']));
    }

    public function getPriceForm($slug)
    {
        $price = find_price($slug);
        if(! $price) abort(404,'Price structure not found');
        return view('payments::settings.price.price_form',compact('price'));
    }

    public function getPaymentGateways()
    {
        $stripe = \Config::get('services.stripe');
        return view('payments::settings.payment_gateways',compact('stripe'));
    }

    public function saveStripe ()
    {
        \Config::set('services.stripe', [
            'model'  => User::class,
            'key' =>'pk_test_zr3Wfst8jb4GrKU8BcLEUkh9',
            'secret' => 'sk_test_5hlaHU2ovKmWpyK33i7sZxxx',
        ]);
    }
}