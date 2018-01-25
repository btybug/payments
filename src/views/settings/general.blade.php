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
                    {!! Form::model(null,['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Currency</div>
                                {!! Form::select('currency',['' => 'Select Currency','usd' => 'USD','gbp' => 'GBP','amd' => 'AMD'],['class' => 'form-control']) !!}
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
    <div class="container-fluid">
        <h2>Taxses</h2>
        <div class="col-md-12">
            <div class="panel panelSettingData">
                <div id="urlManagerCol" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="urlManager">
                    <div class="panel-body">
                        {!! Form::model(null,['url' => route('post_settings_save',['slug' => ''])]) !!}
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">Tax & services</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-horizontal">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="radios">Insert Product
                                                Price</label>
                                            <div class="col-md-4">
                                                <div class="radio">
                                                    <label for="radios-0">
                                                        <input type="radio" name="radios" id="radios-0" value="1"
                                                               checked="checked">
                                                        INCLUDE Tax
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radios-1">
                                                        <input type="radio" name="radios" id="radios-1" value="2">
                                                        EXCLUDE Tax
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="col-md-4 control-label" for="radios">Display Product Price</label>
                                        <div class="col-md-4">
                                            <div class="radio">
                                                <label for="radios-0">
                                                    <input type="radio" name="radios" id="radios-0" value="1"
                                                           checked="checked">
                                                    include Tax
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-1">
                                                    <input type="radio" name="radios" id="radios-1" value="2">
                                                    exclude Tax
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                                    </div>
                                </div>

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
