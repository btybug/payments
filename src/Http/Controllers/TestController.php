<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 31.01.2018
 * Time: 18:02
 */

namespace BtyBugHook\Payments\Http\Controllers;

use BtyBugHook\Payments\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use \Stripe\Stripe;
use Stripe\Customer;

class TestController
{
    public function test ()
    {


        return view('payments::test');
    }

    public function testCallBack (Request $request)
    {
        $data = $request->all();
        Stripe::setApiKey(\Config::get('services.stripe.secret'));

        $result = \Stripe\Customer::create([
            "description" => $data['stripeEmail'],
            "source"      => $data['stripeToken'] // obtained with Stripe.js
        ]);
        $charge = \Stripe\Charge::create([
            'customer' => $result->id,
            'amount'   => 5000,
            'currency' => 'usd'
        ]);
        dd($charge);

    }
}