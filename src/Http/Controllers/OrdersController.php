<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Console\Repository\FrontPagesRepository;
use BtyBugHook\Membership\Models\User;
use BtyBugHook\Payments\Models\Orders;
use BtyBugHook\Payments\Repository\OrdersRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getList()
    {
        return view('payments::orders.index');
    }

    public function saveCash(
        Request $request,
        OrdersRepository $ordersRepository
    )
    {
        if(Cart::count() == 0) return redirect()->back();

        $ordersRepository->create([
            'order_number' => uniqid(),
            'order_details' => json_encode(Cart::content(),true),
            'user_id' => \Auth::id(),
            'payment_method' => 'cash',
            'total_amount' => Cart::total(),
            'status' => Orders::statuses['pending'],
        ]);
        Cart::destroy();
        return redirect()->to('/thank-you');
    }
}