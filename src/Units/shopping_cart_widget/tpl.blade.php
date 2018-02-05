@php
    use Gloudemans\Shoppingcart\Facades\Cart;
    $slug=get_blog_slug_in_page();
@endphp
{!! csrf_field() !!}
<a href="/shopping-card">
    <i class="fa fa-shopping-cart" data-slug="{!! str_replace('-','_',$slug)  !!}" id="shopping-cart-widget"></i> Cart
    <span class="badge shopping-cart-count"></span>
</a>
{!!  BBscript($_this->path.'/js/cart.js') !!}