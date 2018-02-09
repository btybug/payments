@php
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Customer Group</th>
        <th>Quantity From</th>
        <th>Quantity To</th>
        <th>Price / Unit</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th></th>
    </tr>
    </thead>
    <tbody class="append-tr">
    <tr>
        <td>
            <select name="discount_pym_{{$slug}}[0][group]" class="form-control">
                <option value="default">Default</option>
                <option value="other">Other</option>
            </select>
        </td>
        <td>
            <input name="discount_pym_{{$slug}}[0][qty_from]" type="text" class="form-control" placeholder="Quantity">
        </td>
        <td>
            <input name="discount_pym_{{$slug}}[0][qty_to]" type="text" class="form-control" placeholder="Priority">
        </td>
        <td>
            <input name="discount_pym_{{$slug}}[0][price_unit]" type="text" class="form-control" placeholder="Price">
        </td>
        <td>
            <div class="input-group">
                <input name="discount_pym_{{$slug}}[0][start_date]" type="text" class="form-control date_discount" placeholder="Date Start" aria-describedby="date-start">
                <span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input name="discount_pym_{{$slug}}[0][end_date]" type="text" class="form-control date_discount" placeholder="Date End" aria-describedby="date-end">
                <span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>
            </div>
        </td>
        <td>
            <button class="btn bnt-lg btn-primary render_tr"><i class="fa fa-plus-circle"></i></button>
        </td>
    </tr>
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
                '<select class="form-control" name="discount_pym_{{$slug}}['+count+'][group]">'+
                '<option value="default">Default</option>'+
                '<option value="other">Other</option>'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Quantity" name="discount_pym_{{$slug}}['+count+'][qty_from]">'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Priority" name="discount_pym_{{$slug}}['+count+'][qty_to]">'+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control" placeholder="Price" name="discount_pym_{{$slug}}['+count+'][price_unit]">'+
                '</td>'+
                '<td>'+
                '<div class="input-group">'+
                '<input type="text" class="form-control date_discount" placeholder="Date Start" aria-describedby="date-start" name="discount_pym_{{$slug}}['+count+'][start_date]">'+
                '<span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<div class="input-group">'+
                '<input type="text" class="form-control date_discount" placeholder="Date End" aria-describedby="date-end" name="discount_pym_{{$slug}}['+count+'][end_date]">'+
                '<span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<button class="btn bnt-lg remove_tr btn-danger"><i class="fa fa-minus-circle"></i></button>'+
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