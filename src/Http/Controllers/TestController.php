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
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class TestController
{
    public function test()
    {
       return view('payments::test');
    }
    public function testCallBack( Request $request)
    {
      dd($request->all());
    }
}