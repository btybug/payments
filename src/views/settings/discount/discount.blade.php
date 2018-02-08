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
            <select class="form-control">
                <option>Default</option>
                <option>Other</option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Quantity">
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Priority">
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Price">
        </td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Date Start" aria-describedby="date-start">
                <span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Date End" aria-describedby="date-end">
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
        var html = '<tr class="copy_this">'+
                        '<td>'+
                            '<select class="form-control" name="">'+
                                '<option value="">Default</option>'+
                                '<option value="">Other</option>'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" placeholder="Quantity" name="">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" placeholder="Priority" name="">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" placeholder="Price" name="">'+
                        '</td>'+
                        '<td>'+
                            '<div class="input-group">'+
                                '<input type="text" class="form-control" placeholder="Date Start" aria-describedby="date-start" name="">'+
                                '<span class="input-group-addon" id="date-start"><i class="fa fa-calendar"></i></span>'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="input-group">'+
                                '<input type="text" class="form-control" placeholder="Date End" aria-describedby="date-end" name="">'+
                                '<span class="input-group-addon" id="date-end"><i class="fa fa-calendar"></i></span>'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<button class="btn bnt-lg remove_tr btn-danger"><i class="fa fa-minus-circle"></i></button>'+
                        '</td>'+
                    '</tr>';
        $("body").delegate(".render_tr","click",function(){
            $(".append-tr").append(html);
        });
        $("body").delegate(".remove_tr","click",function(){
            $(this).parent().parent().remove();
        });
    }
</script>