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
                                <div class="col-sm-4 p-l-0">Price symbol</div>
                                <div class="col-sm-8">
                                    {!! Form::select('price_symbol',['' => 'Select Symbol','1' => ',','2' => '.'],null,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Date format</div>
                                <div class="col-sm-4">
                                    {!! Form::select('date_format',[
                                    'date_format_custom' => 'Add custom',
                                    'l, d F Y' => date('l, d F Y'),
                                    'd F Y' => date('d F Y'),
                                    'd/m/Y' => date('d/m/Y'),
                                  'd.m.Y' => date('d.m.Y'),
                                  'd-m-Y' => date('d-m-Y'),
                                  'M-d-Y' => date('m-d-Y'),
                                    'Y/m/d' => date('Y/m/d'),
                                    'm / d' => date('m / d'),
                                    'd-M-y' => date('d-M-y'),
                                    'd, M y' => date('d, M y'),
                                    'd, M Y' => date('d, M Y'),
                                  ],null,['class'=>'form-control show_if_custom','placeholder'=>'Enter Date Format'])!!}
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="remove_hidden {{!isset($general['date_format_custom']) ? 'hidden' : ''}} form-control" placeholder="Custom format" name="date_format_custom" value="{{isset($general['date_format_custom']) ? $general['date_format_custom'] : ''}}">
                                </div>
                            </div>

                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Time format</div>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                            {!! Form::radio('time_format', 'seconds', (isset($system['time_format']) && $system['time_format']== 'seconds') ? 'checked' : '') !!}
                                            HH:MM:SS
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {!! Form::radio('time_format', '24hrs', (isset($system['time_format']) && $system['time_format']== '24hrs') ? 'checked' : '') !!}
                                            HH:MM 24 Hours
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {!! Form::radio('time_format', '12hrs', (isset($system['time_format']) && $system['time_format']== '12hrs') ? 'checked' : '') !!}
                                            HH:MM 12 Hours
                                        </label>
                                    </div>
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
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Defaults</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($original_price,["url" => route('payments_settings_general_original_price_save'),'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10 margin_bottom">
                                <div class="col-sm-4 p-l-0">Display Product Price as: Original price <i class="fa fa-plus"></i></div>
                                <div class="col-sm-8">
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
    <script>
        $("body").delegate(".show_if_custom","change",function(){
           var val = $(this).val();
            if(val === 'date_format_custom'){
                $(".remove_hidden").removeClass('hidden');
            }else{
                $(".remove_hidden").val("").addClass('hidden');
            }
        });
    </script>
@stop
