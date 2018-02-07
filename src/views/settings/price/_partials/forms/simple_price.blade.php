<div class="form-group">
    <div class="col-md-6">
        Price
    </div>
    <div class="col-md-6">
        {!! Form::text(\Request::route("slug").'_price',null,['class' => 'form-control']) !!}
    </div>
</div>