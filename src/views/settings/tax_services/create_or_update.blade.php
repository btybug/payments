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
                <p class="description">{{ $errors->first('name') }}</p>
            </div>

            <div class="form-group">
                <label for="attribute_name">Slug</label>
                {!! Form::text('slug',null,['class' => 'form-control']) !!}
                <p class="description">{{ $errors->first('slug') }}</p>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="attribute_type">Amount</label>
                </div>
                <div class="col-md-3">
                    <div class="col-md-9">
                        {!! Form::select('amount_type',['' => 'Select','services' => 'Services','vat' => 'VAT'],null,['class' => 'form-control','id' => 'amount-type']) !!}
                        <p>{{ $errors->first('amount_type') }}</p>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control amount-type"></div>
                    </div>

                </div>
                <div class="col-md-9">
                    {!! Form::text('amount',null,['class' => 'form-control']) !!}
                    <p>{{ $errors->first('amount') }}</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit(($model) ? 'edit tax & service' : 'add tax & service',['class' => 'btn btn-primary pull-right']) !!}
                <a href="{!! route('payments_settings_tax_services') !!}" class="btn pull-right">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('CSS')
@stop
@section('JS')
    <script>
        $("body").on('change', '#amount-type', function () {
            var value = $(this).val();
            if (value == '') {
                $(".amount-type").html('')
            } else {
                if (value == 'services') {
                    $(".amount-type").html('+')
                } else {
                    $(".amount-type").html('%')
                }
            }
        })
    </script>
@stop
