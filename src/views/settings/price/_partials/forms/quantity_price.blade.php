{{--@php--}}
{{--$data = get_qty_data();--}}
{{--@endphp--}}

{{--@if(isset($data['qty_option']))--}}
{{--<div class="col-md-12">--}}
{{--@if($data['qty_option'] == 'select')--}}
{{--<select name="price" class="form-control">--}}
{{--<option value="">Select</option>--}}
{{--@if(isset($data['qty']) && count($data['qty']))--}}
{{--@foreach($data['qty'] as $key => $val)--}}
{{--<option value="{{ $val['qty'] }}">{{ $val['qty'] }}</option>--}}
{{--@endforeach--}}
{{--@endif--}}
{{--</select>--}}
{{--@elseif($data['qty_option'] == 'radio')--}}
{{--@if(isset($data['qty']) && count($data['qty']))--}}
{{--@foreach($data['qty'] as $key => $val)--}}
{{--<input type="radio" name="price" value="{{ $val['qty'] }}">{{ $val['qty'] }}--}}
{{--@endforeach--}}
{{--@endif--}}
{{--@endif--}}
{{--</div>--}}
{{--@else--}}
{{--<a href="{!! url(route('payments_settings_price_form','quantity_price')) !!}"> configure settings </a>--}}
{{--@endif--}}


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
                '                <input type="text" class="form-control" name="qty[0][qty]"/>\n' +
                '            </div>\n' +
                '            <div class="col-md-4">\n' +
                '                <label>\n' +
                '                    Price :\n' +
                '                </label>\n' +
                '                <input type="text" class="form-control" name="qty[0][price]"/>\n' +
                '            </div>\n' +
                '            <div class="col-md-2">\n' +
                '                <a href="javascript:void(0)" class="btn btn-danger btn-delete-row"><i class="fa fa-trash"></i></a>\n' +
                '            </div>\n' +
                '        </div>'
            $('.qty-box').append(html);
        })

        $("body").on('click', '.btn-delete-row', function () {
            $(this).parent().parent().remove();
        })
    })
</script>