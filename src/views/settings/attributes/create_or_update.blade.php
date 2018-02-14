@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
        <h2>{!! ($model) ? 'Edit' : 'Add new' !!} attribute</h2>

        <div class="col-md-8">
            {!! Form::model($model,['class' => 'form-horizontal', 'method' => ($model) ? 'patch' : 'post']) !!}
            @if($model)
                {!! Form::hidden('id',null) !!}
            @endif
            <div class="form-group">
                <label for="attribute_label">Name</label>
                {!! Form::text('name',null,['class' => 'form-control']) !!}
                <p class="description">Name for the attribute (shown on the front-end).</p>
            </div>

            <div class="form-group">
                <label for="attribute_name">Slug</label>
                {!! Form::text('slug',null,['class' => 'form-control']) !!}
                <p class="description">Unique slug/reference for the attribute; must be no more than 28 characters.</p>
            </div>

            <div class="form-group">
                <label for="attribute_type">Type</label>
                {!! Form::select('type',['' => 'Select','text' => 'Text','select' => 'Select','radio' =>'Radio','checkbox'=> 'Checkbox'],null,['class' => 'form-control']) !!}
                <p class="description">Determines how you select attributes for products. Under admin panel -&gt;
                    products -&gt; product data -&gt; attributes -&gt; values, <strong>Text</strong> allows manual entry
                    whereas <strong>select</strong> allows pre-configured terms in a drop-down list.</p>
            </div>

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
    </div>
@stop
@section('CSS')
@stop
@section('JS')

@stop
