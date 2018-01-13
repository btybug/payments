<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;

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

    public function getPaymentGateways()
    {
        return view('payments::settings.payment_gateways');
    }
}