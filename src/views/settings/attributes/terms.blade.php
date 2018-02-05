@extends('btybug::layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-5">
                @include('payments::settings.attributes.terms_create_or_update')
            </div>
            <div class="col-md-7 m-t-15">
                <table id="fields-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Attribute</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </thead>
                </table>
            </div>
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
            $('#fields-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', {
                        text: 'Reload',
                        action: function (e, dt, node, config) {
                            dt.ajax.reload();
                        }
                    }, {
                        text: 'Attributes',
                        action: function (e, dt, node, config) {
                            window.location = '{!! route('payments_settings_attributes') !!}'
                        }
                    }
                ],

                ajax: '{!! route('pym_attribute_terms',['id' => $id]) !!}',
                columns: [
                    {data: 'id', name: 'id',},
                    {data: 'attribute', name: 'attribute'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'description', name: 'description'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });
    </script>
@stop
