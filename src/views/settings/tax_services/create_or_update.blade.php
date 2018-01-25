@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
        <h2>{!! ($model) ? 'Edit' : 'Add new' !!} Tax & Service</h2>

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
                    <div class="col-md-12">
                        <label for="attribute_type">Amount</label>
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('amount_type',['' => 'Select','+' => '+','-' => '-','*' =>'*','/'=> '/','%'=> '%'],null,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('amount_value',null,['class' => 'form-control']) !!}
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
