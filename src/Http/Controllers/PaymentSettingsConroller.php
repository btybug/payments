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
        return view('payments::settings.price');
    }

    public function getPriceForm($slug)
    {
        return view('payments::settings.price_form',compact('slug'));
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