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
            <form action="{!! url('/admin/payments/test-call-back') !!}" method="GET">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_zr3Wfst8jb4GrKU8BcLEUkh9"
                        data-amount="999"
                        data-name="Demo Site"
                        data-description="Widget"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                </script>
            </form>
    @endif
</div>

{!! BBstyle($_this->path."/css/main.css") !!}