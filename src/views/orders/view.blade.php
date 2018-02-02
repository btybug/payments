@extends('btybug::layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(isset($order_details->stripe))
            <table id="orders-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>customer</th>
                    <th>amount</th>
                    <th>currency</th>
                    <th>Cart brand</th>
                    <th>Country</th>
                    <th>Exp Date</th>
                    <th>Stripe Email</th>
                </thead>
                <tbody>
                <tr>

                    <td>{!! $order_details->stripe->id !!}</td>
                    <td>{!! $order_details->stripe->customer !!}</td>
                    <td>{!! $order_details->stripe->amount !!}</td>
                    <td>{!! $order_details->stripe->currency !!}</td>
                    <td>{!! $order_details->stripe->source->brand !!}</td>
                    <td>{!! $order_details->stripe->source->country !!}</td>
                    <td>{!! $order_details->stripe->source->exp_month !!}/{!! $order_details->stripe->source->exp_year !!}</td>
                    <td>{!! $order_details->stripe->source->name !!}</td>
                </tr>
                </tbody>
            </table>
                @endif
        </div>
    </div>
@stop
@section('CSS')
@stop
@section('JS')

@stop