@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>General options</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Defaults</h4>
                </div>
                <div class="panel-body">

                    {!! Form::model($general,["url" => route('payments_settings_general_save'),'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Currency</div>
                                <div class="col-sm-8">
                                    {!! Form::select('currency',['' => 'Select Currency','usd' => 'USD','gbp' => 'GBP','amd' => 'AMD'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Measurement units</div>
                                <div class="col-sm-8">
                                    {!! Form::select('measurement',['' => 'Select Measurement','mm' => 'mm','cm' => 'cm','m'=>'m'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Weight units</div>
                                <div class="col-sm-8">
                                    {!! Form::select('weight_units',['' => 'Select Weight','kg' => 'kg','gm' => 'gm','pound' => 'pound'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Date/time format</div>
                                <div class="col-sm-8">
                                    {!! Form::select('date_format',['' => 'Select Format','1' => 'YYY/MM/DD','2' => 'mm-dd-yyyy'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Price symbol</div>
                                <div class="col-sm-8">
                                    {!! Form::select('price_symbol',['' => 'Select Symbol','1' => ',','2' => '.'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <h2>Single product price</h2>
        <div class="col-md-12">
            <div class="panel panelSettingData">
                <div id="urlManagerCol" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="urlManager">
                    <div class="panel-body">
                        {!! Form::model($original_price,['url' => route('payments_settings_general_original_price_save',['slug' => ''])]) !!}
                        <div class="col-md-12">
                            <div class="form-horizontal">
                                <label class="col-md-4 control-label">Display Product Price as: Original price</label>
                                <div class="col-md-8">
                                    {!! Form::select('original_price',['nothing' => 'Nothing','vat' => 'Vat','services' => 'Services','vat_service' => 'Vat & services'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('CSS')
    <style>
        .margin_bottom{
            margin-bottom: 10px;
        }
    </style>
@stop
@section('JS')
@stop
