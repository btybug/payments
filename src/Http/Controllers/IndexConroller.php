<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexConroller extends Controller
{

    public function getSettings()
    {
        return view('payments::settings.index');
    }
    public function getPayments()
    {
        return view('payments::payments.index');
    }
    public function getShoppingCatr()
    {
        return view('payments::sopping.index');
    }

}