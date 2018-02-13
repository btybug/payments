<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 22.01.2018
 * Time: 22:15
 */

namespace BtyBugHook\Payments\Http\Controllers;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SoppingCartApiController extends Controller
{
    public function addToCart(Request $request)
    {
        $id = $request->get('id');
        $slug = $request->get('slug');
        $product = \DB::table($slug)->find($id);
        $taxAndServices=getTax($slug,$id);
        return Cart::add($product->id, $product->title, 1, product_price($slug, $id),$taxAndServices);
    }

    public function getCartData()
    {
        return Cart::content();
    }

    public function getCount()
    {
        return \Response::json(['count' => Cart::content()->count()]);
    }
}