<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 22.01.2018
 * Time: 22:15
 */

namespace BtyBugHook\Payments\Http\Controllers;


use BtyBugHook\Payments\Http\Requests\SoppingCartRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class SoppingCartApiController extends Controller
{
    public function addToCart(Request $request )
    {
        return Cart::add([
            ['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00],
            ['id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => ['size' => 'large']]
        ]);
    }

    public function getCartData()
    {
        return Cart::content();
    }
}