<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Console\Repository\FrontPagesRepository;
use BtyBugHook\Membership\Models\User;
use Illuminate\Http\Request;

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

    public function getCheckout(FrontPagesRepository $repository)
    {
        $page=$repository->findBy('slug','check_out');
        return view('payments::settings.checkout',compact('page'));
    }

    public function getAttributes()
    {
        return view('payments::settings.attributes');
    }

    public function getPrice()
    {
        $prices = get_prices_data();
        return view('payments::settings.price',compact(['prices']));
    }

    public function getPriceForm($slug)
    {
        $price = find_price($slug);
        if(! $price) abort(404,'Price structure not found');
        return view('payments::settings.price.price_form',compact('price'));
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

    public function getSoppingCart(FrontPagesRepository $repository)
    {
        $page=$repository->findBy('slug','shopping-card');
        return view('payments::settings.shopping_cart.index',compact('page'));
    }

    public function postSaveManager(Request $request,FrontPagesRepository $repository)
    {
        $page=$repository->findBy('slug','check_out');
        $data=$request->except('_token');
        $repository->update($page->id, ['template' => $request->check_out_unit]);
        return redirect()->back()->with('message','Saved!!!');
    }

    public function postSaveCheckOutManager(Request $request,FrontPagesRepository $repository)
    {
        $page=$repository->findBy('slug','check_out');
        $data=$request->except('_token');
        $page->template=$data['check_out_unit'];
        $page->save();
        return redirect()->back()->with('message','Saved!!!');
    }
}