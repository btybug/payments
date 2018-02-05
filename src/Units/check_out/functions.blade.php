<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function allow_guest()
{
    $adminsettingRepository = new \Btybug\btybug\Repositories\AdminsettingRepository;
    $checkout = $adminsettingRepository->getSettings('payment', 'checkout', true);
    if ($checkout) {
        if (isset($checkout['checkout']['allow'])) {
            return (bool)$checkout['checkout']['allow'];
        }
    }
    return false;
}

function show_content()
{
    if (allow_guest()) {
        return true;
    }
    if (Auth::check()) {
        return true;
    }
    return false;
}

function products($settings)
{

}

function get_cart()
{
    return Cart::class;
}

function include_forms($settings, $_this)
{
    $html = ' <form class="form-horizontal" method="post" action="">';
    $html .= \View::make($_this->slug . "::forms.edit_cart", compact($settings))->with('cart', get_cart())->render();
    if (show_content()) {
        $user = Auth::user();
        $html .= View::make($_this->slug . "::forms.invoice_address", compact($settings, 'user'))->render();
        $html .= View::make($_this->slug . "::forms.shipping_address", compact($settings))->render();
        $html .= (isset($settings['buttons'])) ? BBRenderUnits($settings['buttons']) : null;
        $html .= '</form>';
//        $html .= '<div clsass="col-md-8">' . $buttons . '</div>';
    } else {
        $html .= '</form>';
        $html .= View::make($_this->slug . "::forms.login", compact($settings))->render();
    }
    return $html;
}