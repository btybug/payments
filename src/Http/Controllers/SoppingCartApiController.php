<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 22.01.2018
 * Time: 22:15
 */

namespace BtyBugHook\Payments\Http\Controllers;


use BtyBugHook\Payments\Http\Requests\SoppingCartRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SoppingCartApiController extends Controller
{
    public function addToCart(Request $request )
    {
        $product=\DB::table($request->get('slug'))->find($request->get('id'));
        return Cart::add($product->id,$product->title,1,10.52);
    }

    public function getCartData()
    {
        return Cart::content();
    }

    public function getCount()
    {
        return \Response::json(['count'=>Cart::count()]);
    }
}