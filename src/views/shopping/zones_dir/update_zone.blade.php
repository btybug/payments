@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        <div class="row for_title_row">
            <h1 class="text-center">Edit zone</h1>
            {{--{!! Form::open(['url'=>route('payments_sopping_cart_zones_update_save',$zone->id),'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Zone name') !!}
                    {!! Form::text('name',$zone->name,['id' => 'name','class' => 'form-control','placeholder' => 'Insert zone name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Select countries') !!}
                    {!! Form::select('countries[]',$countries,$indexes,['id' => 'country','class' => 'form-control select2','multiple' => 'multiple']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save',["class" => 'btn btn-primary pull-right']) !!}
                </div>
            {!! Form::close() !!}--}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Zone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="clone_this">
                        <td>{!! Form::select('countries[0][country]',$countries,null,['id' => 'country','class' => 'form-control select2']) !!}</td>
                        <td>{!! Form::select('countries[0][zone]',$countries,null,['id' => 'zones','class' => 'form-control select2','multiple' => 'multiple']) !!}</td>
                        <td><button class="btn btn-danger"><i class="fa fa-minus"></i></button></td>
                    </tr>
                    <tr class="append_before">
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary add_row"><i class="fa fa-plus"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="template" id="get_row">
        <tr class="clone_this">
            <td>{!! Form::select('countries[{repl}][country]',$countries,null,['id' => 'country','class' => 'form-control select2']) !!}</td>
            <td>{!! Form::select('countries[{repl}][zone]',['1'=>1,'2'=>2],null,['id' => 'zones','class' => 'form-control select{repl}','multiple' => 'multiple']) !!}</td>
            <td><button class="btn btn-danger"><i class="fa fa-minus"></i></button></td>
        </tr>
    </script>

    <script>
        window.onload = function(){
            $(".select2").select2();
            $("body").delegate(".add_row","click",function(){
                var index = $(".clone_this").length - 1;
                var html = $("#get_row").html();
                html = html.replace('{repl}',index);
                $(".append_before").before(html);
                $(".select"+index).select2();
            });
        };
    </script>
@stop