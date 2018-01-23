@php
use Gloudemans\Shoppingcart\Facades\Cart;

@endphp
{!! csrf_field() !!}
<a href="/shopping-card">
    <i class="fa fa-shopping-cart"></i> Cart <span class="badge shopping-cart-count"></span>
</a>
{!!  BBscript($_this->path.'/js/cart.js') !!}