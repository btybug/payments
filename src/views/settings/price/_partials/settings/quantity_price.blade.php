@php
    $data = get_qty_data();
@endphp
<div class="col-md-12">
    <div class="col-md-12 qty-box">
        <div class="row">
            <div class="col-md-6">
                <label>
                    Quantity :
                </label>
                <input type="text" class="form-control" name="qty[0][qty]"/>
            </div>
            <div class="col-md-6">
                <label>
                    Price :
                </label>
                <input type="text" class="form-control" name="qty[0][price]"/>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <a href="javascript:void(0)" class="add-new-qty"><i class="fa fa-plus"></i> add new</a>
    </div>
    
    {!! Form::model($data,['route' => 'payments_settings_qty_save','class' => 'form-horizontal']) !!}
        <div class="col-md-12 m-t-15">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        Settings
                        {!! Form::submit('save',['class' => 'btn btn-primary pull-right']) !!}
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        Display result as
                    </div>
                    <div class="col-md-4">
                        {!! Form::radio('qty_option','select',true) !!} Select menu
                    </div>
                    <div class="col-md-4">
                        {!! Form::radio('qty_option','radio',null) !!} Radio
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>


<script>
    $(document).ready(function () {
        var qty = '{!! (isset($data['qty']) && count($data['qty'])) ? count($data['qty']) : 0 !!}';
        $("body").on('click', '.add-new-qty', function () {
            qty++;
            var html = '<div class="row">\n' +
                '            <div class="col-md-6">\n' +
                '                <label>\n' +
                '                    Quantity :\n' +
                '                </label>\n' +
                '                <input type="text" class="form-control" name="qty['+qty+'][qty]"/>\n' +
                '            </div>\n' +
                '            <div class="col-md-6">\n' +
                '                <label>\n' +
                '                    Price :\n' +
                '                </label>\n' +
                '                <input type="text" class="form-control" name="qty['+qty+'][price]"/>\n' +
                '            </div>\n' +
                '        </div>'
            $('.qty-box').append(html);
        })
    })
</script>