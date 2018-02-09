@php
    $data = get_tax_service_data(get_options_data('tax_services'));
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<fieldset class="bty-form-select formgeneral">
    <div class="form-group" >
        <label class="col-sm-12 control-label">Select VAT</label>
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-list"></i>
                </span>
                {!! Form::select($slug.'_tax_services_pym[method]',$data,null,['class' => 'form-control select-vat','multiple' => true]) !!}
                <span class="input-group-addon tooltip1">
                    <i class="fa fa-question"></i>
                    <span class="tooltiptext">Choose VAT</span>
                </span>
            </div>
        </div>
    </div>
</fieldset>

{!! HTML::style("public/css/select2/select2.min.css") !!}
{!! HTML::script("public/js/select2/select2.full.min.js") !!}
<script>
    $('.select-vat').select2({
        placeholder: 'Select versions'
    });
</script>