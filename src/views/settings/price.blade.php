@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Price</h2>
        <div class="col-md-12">
            @if(count($prices))
                @foreach($prices as $price)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">{!! ucwords(str_replace('_',' ',$price['slug'])) !!}</h4>
                            <span class="pull-right">
                        <a href="{!! route('payments_settings_price_form',$price['slug']) !!}">Settings</a>
                        Active {!! Form::checkbox($price['slug'],1) !!}
                    </span>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">NO price structure found</div>
            @endif


            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading" role="tab" >--}}
                    {{--<h4 class="panel-title">Price plan</h4>--}}
                    {{--<span class="pull-right">--}}
                        {{--<a href="{!! route('payments_settings_price_form','price_plan') !!}">See From</a>--}}
                        {{--Active {!! Form::checkbox('price_plan',1) !!}--}}
                    {{--</span>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading" role="tab" >--}}
                    {{--<h4 class="panel-title">Attributes based price</h4>--}}
                    {{--<span class="pull-right">--}}
                        {{--<a href="{!! route('payments_settings_price_form','price_attributes') !!}">See From</a>--}}
                        {{--Active {!! Form::checkbox('price_attributes',1) !!}--}}
                    {{--</span>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
@stop
@section('CSS')
@stop
@section('JS')
@stop
