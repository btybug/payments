@php
    $slug = str_replace('-', '_', \Request::route("slug"))
@endphp
<div class="form-group" data-id="id" data-shortcode="axper ste shortcode piti liny">
    <div class="col-md-6">
        Price
    </div>
    <div class="col-md-6">
        {!! Form::text($slug.'_price[value]',null,['class' => 'form-control']) !!}
    </div>
</div>