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

    {{--@if(isset($checkoutButtons['checkout']['payment_gateways']['stripe']))--}}
        <label  class="btn btn-info submit-button" for="stripe-button">Pay With Card</label>
        <input type="checkbox" name="method" class="hidden" value="stripe" id="stripe-button">
    {{--@endif--}}
</div>

{!! BBstyle($_this->path."/css/main.css") !!}
{!! BBscript($_this->path."/js/main.js") !!}

{{--<form action="{!! route('order_stripe') !!}" method="GET">--}}
{{--<script--}}
{{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
{{--data-key="{!! Config::get('services.stripe.key') !!}"--}}
{{--data-amount="{!! $cart::total()*100 !!}"--}}
{{--data-name="Demo Site"--}}
{{--data-description="Widget"--}}
{{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
{{--data-locale="auto">--}}
{{--</script>--}}
{{--</form>--}}