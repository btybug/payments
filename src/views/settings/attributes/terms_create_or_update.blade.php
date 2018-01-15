<div class="col-md-12">
    <h2>{!! ($model) ? 'Edit' : 'Add new' !!} term</h2>

    <div class="col-md-12">
        {!! Form::model($model,['class' => 'form-horizontal', 'method' => ($model) ? 'patch' : 'post']) !!}
        {!! Form::hidden('attribute_id',$id) !!}
        @if($model)
            {!! Form::hidden('id',null) !!}
        @endif
        <div class="form-group">
            <label for="attribute_label">Name</label>
            {!! Form::text('name',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="attribute_name">Slug</label>
            {!! Form::text('slug',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="attribute_type">Description</label>
            {!! Form::textarea('description',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(($model) ? 'edit term' : 'add term',['class' => 'btn btn-primary pull-right']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>