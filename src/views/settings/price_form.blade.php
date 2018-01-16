@extends('btybug::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            @include("payments::settings._partials.".$slug)
        </div>
    </div>
@stop
@section('CSS')
@stop
@section('JS')
@stop
