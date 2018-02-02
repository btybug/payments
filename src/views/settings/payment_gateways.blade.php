@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Payment Gateways</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Stripe</h4>
                    <span class="pull-right">
                        Active {!! Form::checkbox('stripe_activate',1) !!}
                    </span>
                </div>
                <div class="panel-body">
                    {!! Form::model(isset($settings['stripe'])?$settings['stripe']:null,['class'=>'form-horizontal','url'=>route('stripe_settings')]) !!}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Stripe Key</div>
                                {!! Form::text('key',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div><div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Stripe Secret</div>
                                {!! Form::text('secret',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" >
                    <h4 class="panel-title">Cash payment</h4>
                    <span class="pull-right">
                        Active {!! Form::checkbox('cash_paymant_activate',1) !!}
                    </span>
                </div>
                <div class="panel-body">
                    {!! Form::model(null,[]) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
@stop
@section('CSS')
@stop
@section('JS')
@stop
