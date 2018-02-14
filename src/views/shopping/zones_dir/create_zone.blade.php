@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        <div class="row for_title_row">
            <h1 class="text-center">Add new zone</h1>
            {!! Form::open(['url'=>route('payments_sopping_cart_zones_create_save'),'method' => 'post']) !!}
                {{--<div class="form-group">
                    {!! Form::label('name', 'Zone name') !!}
                    {!! Form::text('name','',['id' => 'name','class' => 'form-control','placeholder' => 'Insert zone name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Select countries') !!}
                    {!! Form::select('countries[]',$countries,null,['id' => 'country','class' => 'form-control select2','multiple' => 'multiple']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save',["class" => 'btn btn-primary pull-right']) !!}
                </div>--}}

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th>Zone</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="append_before">
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-primary add_row"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group">
                    {!! Form::submit('Save',["class" => 'btn btn-primary pull-right']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('CSS')
    <style>
        .select2.select2-container.select2-container--default{
            width:700px !important;
        }
    </style>
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
    <script type="template" id="get_row">
        <tr>
            <td>{!! Form::select('countries[{repl_index}][country]',$countries,null,['class' => 'form-control select_for_countries']) !!}</td>
            <td class="zones">{!! Form::select('countries[{repl_index_zone}][zones][]',[],null,['class' => 'form-control select_for_zones {repl}','multiple' => 'multiple']) !!}</td>
            <td><button class="btn btn-danger remove_cauntry" type="button"><i class="fa fa-minus"></i></button></td>
        </tr>
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        window.onload = function(){
            var index = 0;
            $("body").delegate(".add_row","click",function(){
                var d = new Date();
                var uniq = d.getTime();
                var html = $("#get_row").html();
                var uniq_class = 'select2-'+uniq;
                html = html.replace('{repl}',uniq_class).replace('{repl_index}',index).replace('{repl_index_zone}',index);

                $(".append_before").before(html);
                $('select.'+uniq_class).select2();
                index++;
            });

            $("body").delegate(".select_for_countries","change",function(){
                var id = $(this).val();
                var token = $("input[name=_token]").val();
                var that = $(this);
                $.ajax({
                    type:'post',
                    url:'{{route('get_zones_by_country')}}',
                    data:{id:id,_token:token},
                    success:function(data){
                        var result = data;
                        that.parent().parent().children("td.zones").children("select").select2("destroy").select2({
                            data:result
                        });
                    }
                });
            });

            $("body").delegate(".remove_cauntry","click",function(){
                $(this).parent().parent().remove();
                $(".select_for_countries").each(function(index,elem){
                    return $(elem).attr("name",'countries['+index+'][country]');
                });
                $(".select_for_zones").each(function(index,elem){
                    return $(elem).attr("name",'countries['+index+'][zones][]');
                });
                index = $(".select_for_countries").length;
            });
        };
    </script>
@stop