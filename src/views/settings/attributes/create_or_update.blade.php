@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
        <h2>{!! ($model) ? 'Edit' : 'Add new' !!} attribute</h2>

        <div class="col-md-8">
            {!! Form::model($model,['class' => 'form-horizontal', 'method' => ($model) ? 'patch' : 'post']) !!}
            @if($model)
                {!! Form::hidden('id',null) !!}
            @endif
            <div class="row">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Input Data</div>
                    <div class="panel-body">
                        <div class="form-group col-md-6 m-b-10">
                            <label for="lablename" class="col-sm-3 p-l-0 control-label m-0  text-left">
                                Select Type
                            </label>
                            <div class="col-sm-8">
                                {!! Form::select('type',[
                                '' => 'Select Type',
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'select' => 'Select',
                                'radio' => 'Radio',
                                'checkbox' => 'Checkbox',
                                'special' => 'Special',
                            ],null,['class' => 'form-control select-type']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-6 m-b-10">
                            <label class="col-sm-3 p-l-0 control-label m-0  text-left">Extra Validation</label>
                            <div class="col-sm-8">
                                {!! Form::text('extravalidation',null,['class' => 'form-control core-val']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-5 edit_or_create_term">
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
                            </div>
                            <div class="col-md-7 m-t-15">
                                <table id="fields-table" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="terms-box">
                                    @if(count($model->terms))
                                        @foreach($model->terms as $term)
                                            <tr>
                                                <td>{{ $term->name }}
                                                    <input type="hidden" name="terms[{{$term->id}}][name]" value="{{$term->name }}">
                                                </td>
                                                <td>{{ $term->slug }}
                                                    <input type="hidden" name="terms[{{$term->id}}][slug]" value="{{$term->slug }}">
                                                </td>
                                                <td>{{ $term->description }}
                                                    <input type="hidden" name="terms[{{$term->id}}][description]" value="{{$term->description }}">
                                                </td>
                                                <td>
                                                    <a href='javascript:void(0)'
                                                       data-id="{{ $term->id }}" data-name="{{ $term->name }}"
                                                       data-slug="{{ $term->slug }}" data-description="{{ $term->description }}"
                                                       class='btn btn-warning edit-term'><i
                                                                class='fa fa-edit'></i></a>
                                                    <a href='javascript:void(0)' class='btn btn-danger delete-term'><i
                                                                class='fa fa-trash'></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Input Setting</div>
                    <div class="panel-body">
                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="lablename" class="col-sm-3 p-l-0 control-label m-0  text-left">Label
                                    name</label>
                                <div class="col-sm-8">
                                    {!! Form::text('label',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="placeholder"
                                       class="col-sm-3 control-label m-0 text-left ">Placeholder</label>
                                <div class="col-sm-8">
                                    {!! Form::text('placeholder',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="fieldicon" class="col-sm-3 p-l-0 control-label m-0 text-left">Field
                                    Icon</label>
                                <div class="col-sm-8">
                                    {!!Form::text('icon',null,['class' => 'form-control icp','readonly'])  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tooltip-icon" class="col-sm-3 m-0 control-label text-left">Tooltip
                                    Icon</label>
                                <div class="col-sm-8">
                                    {!!Form::text('tooltip_icon',null,['class' => 'form-control icp','readonly','id'=>'tooltip-icon'])  !!}

                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-12 m-b-10">
                            <div class="col-md-6">
                                <label for="help" class="col-sm-3 m-0 control-label text-left">help</label>
                                <div class="col-sm-8">
                                    {!! Form::textarea('help',null,['class'=>'form-control','id'=>'help']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 m-b-10">
                            <div class="form-group col-md-6 m-b-10">
                                <label for='validation_message' class="col-sm-3 m-0 control-label text-left">Error
                                    Message</label>
                                <div class="col-sm-8">
                                    {!! Form::textarea('validation_message',null,['class' => 'form-control','id'=>'validation_message']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                {!! Form::submit(($model) ? 'edit attribute' : 'add attribute',['class' => 'btn btn-primary pull-right']) !!}
                <a href="{!! route('payments_settings_attributes') !!}" class="btn pull-right">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4 display-box">

        </div>
    </div>

    <script type="template" id="new-term">
        <tr>
            <td>
                {name}
                <input type="hidden" name="terms[{count}][name]" value="{name}">
            </td>
            <td>{slug}
                <input type="hidden" name="terms[{count}][slug]" value="{slug}">
            </td>
            <td>{description}
                <input type="hidden" name="terms[{count}][description]" value="{description}">
            </td>
            <td>
                <a href='javascript:void(0)' class='btn btn-warning edit-term'><i
                            class='fa fa-edit'></i></a>
                <a href='javascript:void(0)' class='btn btn-danger delete-term'><i
                            class='fa fa-trash'></i></a>
            </td>
        </tr>
    </script>

    <script type="template" id="term_form">
        <div class="col-md-12">
            <div class="form-group">
                <label for="attribute_label">Name</label>
                <input type="text" name="term_name" value="{name}" class="form-control t-name">
            </div>

            <div class="form-group">
                <label for="attribute_name">Slug</label>
                <input type="text" name="term_slug" value="{slug}" class="form-control t-slug">
            </div>

            <div class="form-group">
                <label for="attribute_type">Description</label>
                <textarea name="term_description" class="form-control t-description">{description}</textarea>
            </div>

            <div class="form-group">
                {!! Form::button('add term',['class' => 'btn btn-primary pull-right add-new-term','type' => 'button']) !!}
            </div>
        </div>
    </script>
@stop
@section('CSS')

    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    <style>
        .display-box {
            min-height: 300px;
            border: 1px solid black;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    <script>
        $('.icp').iconpicker();
        var count = "{{ count($model->terms) }}";
        $("body").on('click', '.edit-term', function () {
            var name = $(this).data('name');
            var slug = $(this).data('slug');
            var description = $(this).data('description');
            var id = $(this).data('id');

            var termForm = $("#term_form").html();
            termForm = termForm.replace('{name}',name);
            termForm = termForm.replace('{slug}', slug);
            termForm = termForm.replace('{description}', description);
            termForm = termForm.replace('{count}', description);
            $(".edit_or_create_term").html(termForm);
        });
        $("body").on('click', '.add-new-term', function () {
            var name = $('.t-name').val();
            var slug = $('.t-slug').val();
            if(name != '' && name != undefined && slug !='' && slug != undefined){
                count++;
                var description = $('.t-description').val();

                var html = $("#new-term").html();
                html = html.replace('{name}', name);
                html = html.replace('{slug}', slug);
                html = html.replace('{description}', description);
                html = html.replace('{count}', count);
                $(".terms-box").append(html);

                var termForm = $("#term_form").html();
                termForm = termForm.replace('{name}', '');
                termForm = termForm.replace('{slug}', '');
                termForm = termForm.replace('{description}', '');
                $(".edit_or_create_term").html(termForm);
            }else{
                alert("fill data then click to save !!!")
            }

        })
    </script>
@stop
