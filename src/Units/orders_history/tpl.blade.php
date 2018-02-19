@inject('orderService', 'BtyBugHook\Payments\Services\OrdersService')
@php
   $orders = $orderService->getOrdersByAuth();
@endphp
<div class="order_history">
    <h3>Order history</h3>
    <table class="bty-table bty-table-active bty-table-hover">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>No. of Products</th>
            <th>Status</th>
            <th>Total</th>
            <th>Payment Type</th>
            <th>Date Added</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(count($orders))
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->order_number }}</td>
                    <td>2 (need implement)</td>
                    <td>
                        <span class="td-inactive">Pending</span>
                    </td>
                    <td>${{ $order->total_amount }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ BBgetDateFormat($order->created_at) }}</td>
                    <td><a href="#" class="btn btn-danger"><i class="fa fa-eye"></i></a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">NO ORDERS</td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="buttons">
        <div class="pull-right"><a href="/my-account" class="btn btn-primary">Continue</a></div>
    </div>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}