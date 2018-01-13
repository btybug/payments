<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;

class PaymentSettingsConroller extends Controller
{
    public function getSettings()
    {
        return view('payments::settings.index');
    }

    public function getStripe()
    {
        return view('payments::settings.stripe');
    }

    public function getPaypal()
    {
        return view('payments::settings.paypal');
    }
}