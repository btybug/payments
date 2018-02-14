@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
        <h2>{!! ($model) ? 'Edit' : 'Add new' !!} attribute</h2>

        <div class="col-md-8">
            {!! Form::model($model,['class' => 'form-horizontal', 'method' => ($model) ? 'patch' : 'post']) !!}
            @if($model)
                {!! Form::hidden('id',null) !!}
            @endif
            <div class="row">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Input Data</div>
                    <div class="panel-body">
                        <div class="form-group col-md-6 m-b-10">
                            <label for="lablename" class="col-sm-3 p-l-0 control-label m-0  text-left">
                                Select Type
                            </label>
                            <div class="col-sm-8">
                                {!! Form::select('type',[
                                '' => 'Select Type',
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'select' => 'Select',
                                'radio' => 'Radio',
                                'checkbox' => 'Checkbox',
                                'special' => 'Special',
                            ],null,['class' => 'form-control select-type']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 p-l-0 control-label m-0  text-left">Data</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('data',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-6 m-b-10">
                            <label class="col-sm-3 p-l-0 control-label m-0  text-left">Extra Validation</label>
                            <div class="col-sm-8">
                                {!! Form::text('extravalidation',null,['class' => 'form-control core-val']) !!}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Input Setting</div>
                    <div class="panel-body">
                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="lablename" class="col-sm-3 p-l-0 control-label m-0  text-left">Label
                                    name</label>
                                <div class="col-sm-8">
                                    {!! Form::text('label',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="placeholder" class="col-sm-3 control-label m-0 text-left ">Placeholder</label>
                                <div class="col-sm-8">
                                    {!! Form::text('placeholder',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="fieldicon" class="col-sm-3 p-l-0 control-label m-0 text-left">Field Icon</label>
                                <div class="col-sm-8">
                                    {!!Form::text('icon',null,['class' => 'form-control icp','readonly'])  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tooltip-icon" class="col-sm-3 m-0 control-label text-left">Tooltip Icon</label>
                                <div class="col-sm-8">
                                    {!!Form::text('tooltip_icon',null,['class' => 'form-control icp','readonly','id'=>'tooltip-icon'])  !!}

                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="help" class="col-sm-3 m-0 control-label text-left">help</label>
                                <div class="col-sm-8">
                                    {!! Form::textarea('help',null,['class'=>'form-control','id'=>'help']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 m-b-10">
                            <div class="form-group col-md-6 m-b-10">
                                <label  for='validation_message' class="col-sm-3 m-0 control-label text-left">Error Message</label>
                                <div class="col-sm-8">
                                    {!! Form::textarea('validation_message',null,['class' => 'form-control','id'=>'validation_message']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                {!! Form::submit(($model) ? 'edit attribute' : 'add attribute',['class' => 'btn btn-primary pull-right']) !!}
                <a href="{!! route('payments_settings_attributes') !!}" class="btn pull-right">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4 display-box">

        </div>
    </div>
@stop
@section('CSS')
    <style>
        .display-box{
            min-height: 300px;
            border: 1px solid black;
        }
    </style>
@stop
@section('JS')

@stop
