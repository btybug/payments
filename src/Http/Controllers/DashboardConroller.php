<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;

class DashboardConroller extends Controller
{
    public function getIndex ()
    {
        return view('payments::dashboard.index');
    }
}