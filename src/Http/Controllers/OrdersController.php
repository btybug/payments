<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Console\Repository\FrontPagesRepository;
use BtyBugHook\Membership\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getList()
    {
        return view('payments::orders.index');
    }

    public function saveCash(Request $request)
    {
        dd($request->all());
    }
}