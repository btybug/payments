@php
    $options = get_options_data('price');
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<fieldset class="bty-form-select formgeneral">
    <div class="form-group">
        <label class="col-sm-12 control-label">Select Price</label>
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-list"></i>
                </span>
                <select name="{{ $slug }}_price[method]" data-type="price" class="form-control1 input-md select-option-type"
                        id="select-price">
                    <option selected="selected" value="">Select Price</option>
                    @foreach($options as $k => $option)
                        <option value="{!! $k !!}">{!! str_replace('_',' ',$k) !!}</option>
                    @endforeach
                </select>
                <span class="input-group-addon tooltip1">
                    <i class="fa fa-question"></i>
                    <span class="tooltiptext">Choose your price method</span>
                </span>
            </div>
        </div>
    </div>
</fieldset>
<div class="select-price">

</div>
<script>
    $('body').on('change', '.select-option-type', function () {
        var type = $(this).data('type');
        var value = $(this).val();
        if (value != '' && value != undefined) {
            $.ajax({
                type: "post",
                datatype: "json",
                url: '{!! route('mbsp_settings_mb_get_option',\Request::route('slug')) !!}',
                data: {type: type, value: value},
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success: function (data) {
                    $('.select-' + type).html(data);
                }
            });
        }
    });
</script>