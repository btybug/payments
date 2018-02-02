@extends('btybug::layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="orders-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Order Number</th>
                    <th>User</th>
                    <th>Invoice Address</th>
                    <th>Shipping Address</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Created date</th>
                    <th>Actions</th>
                </thead>
            </table>
        </div>
    </div>

@stop
@section('CSS')
    {!! Html::style('public/js/DataTables/Buttons-1.5.1/js/buttons.bootstrap.js') !!}
@stop
@section('JS')
    {!! Html::script('public/js/DataTables/datatables.js') !!}
    <script>
        $(function () {
            $('#orders-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', {
                        text: 'Reload',
                        action: function (e, dt, node, config) {
                            dt.ajax.reload();
                        }
                    }
                ],
                ajax: '{!! route('pym_orders_list') !!}',
                columns: [
                    {data: 'id', name: 'id',},
                    {data: 'order_number', name: 'order_number'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'invoice_address', name: 'invoice_address'},
                    {data: 'shipping_address', name: 'shipping_address'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'total_amount', name: 'total_amount'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });
    </script>
@stop