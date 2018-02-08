@php
    $slug = str_replace('-', '_', \Request::route("slug"))
@endphp
<div class="form-group">
    <div class="col-md-6">
        Price
    </div>
    <div class="col-md-6">
        {!! Form::text($slug.'_price[value]',null,['class' => 'form-control']) !!}
    </div>
</div>