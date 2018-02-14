<div class="col-md-12">
    <div class="form-group">
        <label for="attribute_label">Name</label>
        {!! Form::text('term_name',null,['class' => 'form-control t-name']) !!}
    </div>

    <div class="form-group">
        <label for="attribute_name">Slug</label>
        {!! Form::text('term_slug',null,['class' => 'form-control t-slug']) !!}
    </div>

    <div class="form-group">
        <label for="attribute_type">Description</label>
        {!! Form::textarea('term_description',null,['class' => 'form-control t-description']) !!}
    </div>

    <div class="form-group">
        {!! Form::button('add term',['class' => 'btn btn-primary pull-right add-new-term','type' => 'button']) !!}
    </div>
</div>