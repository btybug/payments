@extends('btybug::layouts.admin')
@section('content')
    <div class="headar-btn">
        <div></div>
        <div>
            {!! Form::submit(($model) ? 'edit attribute' : 'add attribute',['class' => 'edit pull-right']) !!}
            <a href="{!! route('payments_settings_attributes') !!}" class="cancel pull-right"><span>Cancel</span></a>
        </div>
    </div>
    <div class="">
        <div class="title-btn">
            <h2>{!! ($model) ? 'Edit' : 'Add new' !!} attribute</h2>

        </div>


        <div class="col-md-9">
            {!! Form::model($model,['class' => 'form-horizontal', 'method' => ($model) ? 'patch' : 'post']) !!}
            @if($model)
                {!! Form::hidden('id',null) !!}
            @endif
            <div class="">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Input Data</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-12 p-l-0 control-label m-0  text-left">Name</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 p-l-0 control-label m-0  text-left">Slug</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-slack"></i></span>
                                    {!! Form::text('slug',null,['class' => 'form-control']) !!}
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lablename" class="col-sm-12 p-l-0 control-label m-0  text-left">
                                Select Type
                            </label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-server"></i></span>
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
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 p-l-0 control-label m-0  text-left">Extra Validation</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
                                    {!! Form::text('extravalidation',null,['class' => 'form-control core-val']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="edit_or_create_term">
                            <div class="form-group">
                                <label for="attribute_label" class="col-sm-12 control-label text-left">Term Name</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                        {!! Form::text('term_name',null,['class' => 'form-control t-name']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attribute_name" class="col-sm-12 control-label text-left">Term Slug</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-slack"></i></span>
                                        {!! Form::text('term_slug',null,['class' => 'form-control t-slug']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attribute_type" class="col-sm-12 control-label text-left">Term
                                    Description</label>
                                <div class="col-sm-12">
                                    {!! Form::textarea('term_description',null,['class' => 'form-control t-description']) !!}
                                </div>
                            </div>

                            <div class="button-extra">
                                {!! Form::button('add term',['class' => 'btn btn-primary pull-right add-new-term','type' => 'button']) !!}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
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
                                    @if(isset($model) && count($model->terms))
                                        @foreach($model->terms as $term)
                                            <tr data-id="{{ $term->id }}">
                                                <td>{{ $term->name }}
                                                    <input type="hidden" name="terms[{{$term->id}}][name]"
                                                           value="{{$term->name }}">
                                                </td>
                                                <td>{{ $term->slug }}
                                                    <input type="hidden" name="terms[{{$term->id}}][slug]"
                                                           value="{{$term->slug }}">
                                                </td>
                                                <td>{{ $term->description }}
                                                    <input type="hidden" name="terms[{{$term->id}}][description]"
                                                           value="{{$term->description }}">
                                                </td>
                                                <td>
                                                    <a href='javascript:void(0)'
                                                       data-id="{{ $term->id }}" data-name="{{ $term->name }}"
                                                       data-slug="{{ $term->slug }}"
                                                       data-description="{{ $term->description }}"
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
            <div class="panel panel-default p-0">
                <div class="panel-heading">Input Setting</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="lablename" class="col-sm-12 control-label text-left">Label
                            name</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                {!! Form::text('label',null,['class' => 'form-control']) !!}
                            </div>

                        </div>
                    </div>
                    <div class="form-group">

                        <label for="placeholder" class="col-sm-12 control-label text-left ">Placeholder</label>

                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                {!! Form::text('placeholder',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fieldicon" class="col-sm-12 control-label text-left">Field
                            Icon</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-slack"></i></span>
                                {!!Form::text('icon',null,['class' => 'form-control icp','readonly'])  !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tooltip-icon" class="col-sm-12 control-label text-left">Tooltip
                            Icon</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-slack"></i></span>
                                {!!Form::text('tooltip_icon',null,['class' => 'form-control icp','readonly','id'=>'tooltip-icon'])  !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="help" class="col-sm-12 m-0 control-label text-left">Help</label>
                        <div class="col-sm-12">
                            {!! Form::textarea('help',null,['class'=>'form-control','id'=>'help']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for='validation_message' class="col-sm-12 m-0 control-label text-left">Error
                            Message</label>
                        <div class="col-sm-12">
                            {!! Form::textarea('validation_message',null,['class' => 'form-control','id'=>'validation_message']) !!}
                        </div>
                    </div>
                </div>
            </div>


            {!! Form::close() !!}
        </div>
        <div class="col-md-3 display-box">

        </div>
    </div>

    <script type="template" id="new-term">
        <tr data-id="{count}">
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
                <a href='javascript:void(0)'
                   data-id="{count}" data-name="{name}"
                   data-slug="{slug}" data-description="{description}"
                   class='btn btn-warning edit-term'><i
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
                {!! Form::button('add term',['class' => 'btn btn-primary pull-right add-new-term','type' => 'button', 'data-id' => '{count}']) !!}
            </div>
        </div>
    </script>
@stop
@section('CSS')

    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    <style>
        .display-box {
            min-height: 400px;
            border: 1px solid #eee;
            border-radius: 5px;
            box-shadow: 0 0 5px 0 #ccc;
        }

        .title-btn {
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0 !important;
            height: 40px;

        }
textarea.form-control{
    height:90px !important;
}
        .form-control:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: #ccc;
        }

        table .terms-box tr td:last-of-type {
            text-align: center;
        }

        .control-label {
            padding-right: 0;
            margin-bottom: 3px !important;
        }

        .title-btn > div input {

        }

        .title-btn > div a {
            margin-right: 10px;
        }

        .bty-btn {
            padding: 10px 15px;
        }

        .headar-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #78909C;
            color: #fff;
            padding: 10px 15px;
            margin: 0 -15px;
        }

        .headar-btn .cancel {
            background: #bf0000;
            color: #ffffff;
            border: none;
            font-weight: bold;
            padding: 5px 30px;
            text-transform: uppercase;
            margin-right: 10px;
            text-decoration: none;
        }

        .headar-btn .edit {
            background: #e4d700;
            color: #524e02;
            border: none;
            font-weight: bold;
            padding: 5px 30px;
            text-transform: uppercase;
        }

        .button-extra {
            margin-bottom: 15px;
        }

        .button-extra > button {
            border-radius: 0;
        }

        .input-group-addon {
            border-radius: 0;
            min-width: 40px;
        }
        .title-btn h2{
            font-size: 24px;
        }

    </style>
@stop
@section('JS')
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    <script>
        $('.icp').iconpicker();
        var count = "{{ (isset($model)) ? count($model->terms) : 0 }}";

        $("body").on('click', '.delete-term', function () {
            $(this).parents('tr').remove();
        });
        $("body").on('click', '.edit-term', function () {
            var name = $(this).data('name');
            var slug = $(this).data('slug');
            var description = $(this).data('description');
            var id = $(this).data('id');

            var termForm = $("#term_form").html();
            termForm = termForm.replace(/{name}/g, name);
            termForm = termForm.replace(/{slug}/g, slug);
            termForm = termForm.replace(/{description}/g, description);
            termForm = termForm.replace(/{count}/g, id);
            $(".edit_or_create_term").html(termForm);
        });
        $("body").on('click', '.add-new-term', function () {
            var name = $('.t-name').val();
            var slug = $('.t-slug').val();
            if (name != '' && name != undefined && slug != '' && slug != undefined) {
                var id = $(this).data('id');
                var description = $('.t-description').val();

                if (id == '' || id == undefined) {
                    id = Math.floor(Math.random() * 26) + Date.now();
                    var html = $("#new-term").html();
                    html = html.replace(/{name}/g, name);
                    html = html.replace(/{slug}/g, slug);
                    html = html.replace(/{description}/g, description);
                    html = html.replace(/{count}/g, id);
                    $(".terms-box").append(html);
                } else {
                    var html = $("#new-term").html();
                    html = html.replace(/{name}/g, name);
                    html = html.replace(/{slug}/g, slug);
                    html = html.replace(/{description}/g, description);
                    html = html.replace(/{count}/g, id);

                    $(".terms-box tr[data-id='" + id + "']").replaceWith(html);
                }

                var termForm = $("#term_form").html();
                termForm = termForm.replace(/{name}/g, '');
                termForm = termForm.replace(/{slug}/g, '');
                termForm = termForm.replace(/{description}/g, '');
                termForm = termForm.replace(/{count}/g, '');
                $(".edit_or_create_term").html(termForm);
            } else {
                alert("fill data then click to save !!!")
            }

        })
    </script>
@stop
