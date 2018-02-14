@extends('btybug::layouts.mTabs',['index'=>'shopping_cart'])
<!-- Nav tabs -->
@section('tab')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Countries</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{$zone->id}}</td>
                    <td>{{$zone->name}}</td>
                    <td>{{$zone->countries}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary pull-right" href="{{route('payments_sopping_cart_zones_create')}}">New Zone</a>
@stop