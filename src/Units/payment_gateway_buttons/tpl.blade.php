@php
    $adminsettingsRepository = new \Btybug\btybug\Repositories\AdminsettingRepository();
    $checkoutButtons = $adminsettingsRepository->getSettings('payment', 'checkout',true);
    $cart = \Gloudemans\Shoppingcart\Facades\Cart::class;
@endphp

<div class="col-md-12">
    @if(isset($checkoutButtons['checkout']['payment_gateways']['cash']))
        {!! Form::open(['url' => url(route('order_cash'))]) !!}
            @if($cart::count())
            {!! Form::submit('Pay now',['class' => 'btn btn-success']) !!}
        @else
            {!! Form::button('Pay now',['class' => 'btn btn-success','disabled' => 'disabled']) !!}
            @endif
        {!! Form::close() !!}
    @endif

    @if(isset($checkoutButtons['checkout']['payment_gateways']['stripe']))
        {!! Form::button('Pay with Stripe (not working yet)',['class' => 'btn btn-primary','disabled' => 'disabled']) !!}
    @endif
</div>

{!! BBstyle($_this->path."/css/main.css") !!}