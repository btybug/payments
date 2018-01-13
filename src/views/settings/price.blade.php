@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Price</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">simple price</h4>
                    <span class="pull-right">
                        Active {!! Form::checkbox('simple_price',1) !!}
                    </span>
                </div>
                <div class="panel-body">
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" >
                    <h4 class="panel-title">Price plan</h4>
                    <span class="pull-right">
                        Active {!! Form::checkbox('price_plan',1) !!}
                    </span>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
@stop
@section('CSS')
@stop
@section('JS')
@stop
