@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        <div class="row for_title_row">
            <h1 class="text-center">Edit zone</h1>
            {!! Form::open(['url'=>route('payments_sopping_cart_zones_update_save',$zone->id),'method' => 'post']) !!}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Zone</th>
                            <th>All cities</th>
                            <th>Any exceptions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clone_this">
                            <td>{!! Form::select('countries[0][country]',$countries,[$country_index],['id' => 'country','class' => 'form-control select2','disabled' => 'disabled']) !!}</td>
                            <td class="zones_disable">{!! Form::select('countries[0][zones][]',$cities,$active_cities,['id' => 'zones','class' => 'form-control select2','multiple' => 'multiple',$zone->all ? "disabled=>disabled" : '']) !!}</td>
                            <td>
                                <label>Select all
                                    <input type="checkbox" id="select-all" class="select-all" name="countries[0][all]" value="1" {{$zone->all ? 'checked' : ''}}>
                                </label>
                            </td>
                            <td class="exceptions_active">{!! Form::select('countries[0][exceptions][]',$cities,$active_exceptions,['id' => 'exceptions','class' => 'form-control select2-exceptions','multiple' => 'multiple', !$zone->all ? "disabled=>disabled" : '']) !!}</td>
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
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        window.onload = function(){
            $('.select2').select2();
            $('.select2-exceptions').select2();

            $("body").delegate(".select-all","click",function(){
                var is_checked = $(this).prop("checked");
                var select_element = $(this).parents("td").parent().children("td.exceptions_active").children("select");
                var select_zones = $(this).parents("td").parent().children("td.zones_disable").children("select");
                if(is_checked){
                    select_zones.attr("disabled",true);
                    return  select_element.attr("disabled",false).attr("name","countries[0][exceptions][]");
                }else{
                    select_element.attr("disabled",true);
                    return select_zones.attr("disabled",false).attr("name","countries[0][zones][]");
                }
            });
        }
    </script>
@stop