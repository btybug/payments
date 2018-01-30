@php
    $adminsettingsRepository = new \Btybug\btybug\Repositories\AdminsettingRepository();
    $checkoutButtons = $adminsettingsRepository->getSettings('payment', 'checkout',true);
@endphp

<div class="col-md-12">
    @if(isset($checkoutButtons['checkout']['payment_gateways']['cash']))
        {!! Form::open(['url' => url(route('order_cash'))]) !!}
            {!! Form::submit('Pay now',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    @endif
</div>

{!! BBstyle($_this->path."/css/main.css") !!}