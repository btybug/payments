@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <table id="fields-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Terms</th>
            <th>Actions</th>
        </thead>
    </table>

@stop
@section('CSS')
    {!! Html::style('public/js/DataTables/Buttons-1.5.1/js/buttons.bootstrap.js') !!}
@stop
@section('JS')
    {!! Html::script('public/js/DataTables/datatables.js') !!}
    <script>
        $(function () {
            $('#fields-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', {
                        text: 'Reload',
                        action: function (e, dt, node, config) {
                            dt.ajax.reload();
                        }
                    }, {
                        text: 'Create New',
                        action: function (e, dt, node, config) {
                            window.location = '/admin/payments/settings/attributes/create'
                        }
                    }
                ],

                ajax: '{!! route('pym_attributes_list') !!}',
                columns: [
                    {data: 'id', name: 'id',},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'type', name: 'type'},
                    {data: 'terms', name: 'terms'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });
    </script>
@stop
