@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Checkout options</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">General</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model(null,[]) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-sm-4 p-l-0">allow guest check out</div>
                                {!! Form::radio('checkout[allow]',0,true) !!}
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-4 p-l-0">Only members</div>
                                {!! Form::radio('checkout[allow]',1,null) !!}
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
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Allow these payment options on check out page</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model(null,[]) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Stripe</div>
                                {!! Form::checkbox('checkout[stripe]',1,null) !!}
                            </div>
                        </div>
                    </div><div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Cash payment</div>
                                {!! Form::checkbox('checkout[cash]',1,null) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
@section('CSS')
@stop
@section('JS')
@stop
