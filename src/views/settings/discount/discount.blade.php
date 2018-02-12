@php
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Customer Group</th>
        <th>Quantity From</th>
        <th>Quantity To</th>
        <th>Price / Unit Discount (%)</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th></th>
    </tr>
    </thead>
    <tbody class="append-tr">
        @if(isset($form_model) && isset($form_model[$slug.'_discount_pym']))
            @foreach($form_model[$slug.'_discount_pym'] as $key => $item)
                <tr>
                    <td>
                        {!! Form::select($slug."_discount_pym[$key][group]",['default' => 'Default','other' => 'Other'],
                        $item['group']
                        ,['class' => 'form-control']) !!}
                    </td>
                    <td>
                        <input name="{{$slug}}_discount_pym[{{$key}}][qty_from]" value="{{ $item['qty_from'] }}" type="text" class="form-control" placeholder="Quantity">
                    </td>
                    <td>
                        <input name="{{$slug}}_discount_pym[{{$key}}][qty_to]" value="{{ $item['qty_to'] }}" type="text" class="form-control" placeholder="Priority">
                    </td>
                    <td>
                        <input name="{{$slug}}_discount_pym[{{$key}}][price_unit]" value="{{ $item['price_unit'] }}" type="text" class="form-control" placeholder="Price">
                    </td>
                    <td>
                        <div class="input-group">
                            <input name="{{$slug}}_discount_pym[{{$key}}][start_date]" value="{{ $item['start_date'] }}" type="text" class="form-control date_discount" placeholder="Date Start" aria-describedby="date-start">
                            <span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <input name="{{$slug}}_discount_pym[{{$key}}][end_date]" value="{{ $item['end_date'] }}" type="text" class="form-control date_discount" placeholder="Date End" aria-describedby="date-end">
                            <span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td>
                        @if($loop->first)
                            <button type="button" class="btn bnt-lg btn-primary render_tr"><i class="fa fa-plus-circle"></i></button>
                        @else
                            <button type="button" class="btn bnt-lg remove_tr btn-danger"><i class="fa fa-minus-circle"></i></button>
                        @endif

                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>
                    <select name="{{$slug}}_discount_pym[0][group]" class="form-control">
                        <option value="default">Default</option>
                        <option value="other">Other</option>
                    </select>
                </td>
                <td>
                    <input name="{{$slug}}_discount_pym[0][qty_from]" type="text" class="form-control" placeholder="Quantity">
                </td>
                <td>
                    <input name="{{$slug}}_discount_pym[0][qty_to]" type="text" class="form-control" placeholder="Priority">
                </td>
                <td>
                    <input name="{{$slug}}_discount_pym[0][price_unit]" type="text" class="form-control" placeholder="Price">
                </td>
                <td>
                    <div class="input-group">
                        <input name="{{$slug}}_discount_pym[0][start_date]" type="text" class="form-control date_discount" placeholder="Date Start" aria-describedby="date-start">
                        <span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input name="{{$slug}}_discount_pym[0][end_date]" type="text" class="form-control date_discount" placeholder="Date End" aria-describedby="date-end">
                        <span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn bnt-lg btn-primary render_tr"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
        @endif
    </tbody>
</table>
<script>
    window.onload = function(){
        $( ".date_discount" ).datepicker();
        var count = 1;
        $("body").delegate(".render_tr","click",function(){
            count++;
            var html = '<tr class="copy_this">'+
                '<td>'+
                '<select class="form-control" name="{{$slug}}_discount_pym['+count+'][group]">'+
                '<option value="default">Default</option>'+
                '<option value="other">Other</option>'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Quantity" name="{{$slug}}_discount_pym['+count+'][qty_from]">'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Priority" name="{{$slug}}_discount_pym['+count+'][qty_to]">'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Price" name="{{$slug}}_discount_pym['+count+'][price_unit]">'+
                '</td>'+
                '<td>'+
                '<div class="input-group">'+
                '<input type="text" class="form-control date_discount" placeholder="Date Start" aria-describedby="date-start" name="{{$slug}}_discount_pym['+count+'][start_date]">'+
                '<span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<div class="input-group">'+
                '<input type="text" class="form-control date_discount" placeholder="Date End" aria-describedby="date-end" name="{{$slug}}_discount_pym['+count+'][end_date]">'+
                '<span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<button type="button" class="btn bnt-lg remove_tr btn-danger"><i class="fa fa-minus-circle"></i></button>'+
                '</td>'+
                '</tr>';
            $(".append-tr").append(html);
            $( ".date_discount" ).datepicker();
        });
        $("body").delegate(".remove_tr","click",function(){
            $(this).parent().parent().remove();
        });
    }
</script>