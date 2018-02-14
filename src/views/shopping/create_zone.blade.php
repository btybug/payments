@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        <div class="row for_title_row">
            <h1 class="text-center">Add new zone</h1>
            {!! Form::open(['url'=>'']) !!}
                <div class="form-group">
                    <label for="">Select Countries</label>
                    {!! Form::select('',$countries,null,['class' => 'form-control select2','multiple' => 'multiple']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        window.onload = function(){
            $(".select2").select2();
        };
    </script>
@stop