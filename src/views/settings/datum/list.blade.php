@php
    $options = get_options_data('data');
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<fieldset class="bty-form-select formgeneral">
    <div class="form-group">
        <label class="col-sm-12 control-label">Select Data</label>
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-list"></i>
                </span>
                <select name="{{ $slug }}_data[method]" data-type="data"
                        class="form-control1 input-md select-option-type-data"
                        id="select-data">
                    <option selected="selected" value="">Select Data</option>
                    @foreach($options as $k => $option)
                        <option value="{!! $k !!}">{!! str_replace('_',' ',$k) !!}</option>
                    @endforeach
                </select>
                <span class="input-group-addon tooltip1">
                    <i class="fa fa-question"></i>
                    <span class="tooltiptext">Choose your data method</span>
                </span>
            </div>
        </div>
    </div>
</fieldset>
<div class="select-data">

</div>
<script>
    $('body').on('change', '.select-option-type-data', function () {
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