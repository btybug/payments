@php
    $options = get_options_data('price')
@endphp
<fieldset class="bty-form-select" id="bty-input-id-16">
    <div class="bty-input-select-1">
        <select data-type="price" class="form-control input-md select-option-type"
                id="select-price">
            <option selected="selected" value="">Select Price</option>
            @foreach($options as $k => $option)
                <option value="{!! $k !!}">{!! str_replace('_',' ',$k) !!}</option>
            @endforeach
        </select>
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