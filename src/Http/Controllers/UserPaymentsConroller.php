<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;

class UserPaymentsConroller extends Controller
{
    public function getIndex ()
    {
        return view('payments::user_payments.index');
    }
}