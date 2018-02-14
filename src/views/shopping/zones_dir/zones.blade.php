@extends('btybug::layouts.mTabs',['index'=>'shopping_cart'])
<!-- Nav tabs -->
@section('tab')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Countries</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{$zone->id}}</td>
                    <td>{{$zone->name}}</td>
                    <td>{{$zone->countries}}</td>
                    <td>
                        <a href="{{route('payments_sopping_cart_zones_update',$zone->id)}}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary pull-right" href="{{route('payments_sopping_cart_zones_create')}}">New Zone</a>
@stop