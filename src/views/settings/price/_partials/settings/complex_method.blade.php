@php
    $data = get_qty_data();
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp



<div class="col-md-12">

    <div class="col-md-9">
        <div class="col-md-12 m-t-15" style="    margin-bottom: 9px;
    margin-top: 7px;">
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Get Attributes
            </button>
        </div>
        <div class="col-md-4">
            <ul class="nav nav-pills nav-stacked col-md-12">
                <li class="active"><a href="#tab_a" data-toggle="pill">Radio</a></li>
            </ul>
        </div>
        <div class="col-md-8 tab-content">
            <div class="tab-pane active" id="tab_a">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="panel-title">
                                    Display Options
                                </h4>
                            </div>
                            <div class="col-md-8">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <h4 class="panel-title">

                        </h4>

                    </div>
                    <div class="panel-body" style="background-color: #70a98d">
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <select class=" form-control condition-option">
                                    <option>Red</option>
                                    <option>Blue</option>
                                    <option>Black</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control condition-types">
                                    <option>Always display</option>
                                    <option>Conditional</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            Price options
                        </h4>
                    </div>
                    <div class="panel-body" style="background-color: #70a98d">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Panel Name</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="checkboxes">Attributes</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="checkboxes-0">
                                    <input type="checkbox" id="checkboxes-0" value="radio">
                                    Radio
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkboxes-1">
                                    <input type="checkbox" id="checkboxes-1" value="select">
                                    Select
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkboxes-2">
                                    <input type="checkbox" id="checkboxes-2" value="text">
                                    Text
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success add-new-options-panel" data-dismiss="modal">Save
                </button>
            </div>
        </div>

    </div>
</div>
<script type="template" id="tab-menu">
    <li class=""><a href="#{tab}" data-toggle="pill">{title}</a></li>
</script>
<script type="template" id="attributes-options">
    <div class="main_lay_cont">
        <div class="row for_title_row">
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
            </div>
        </div>
    </div>
</script>

<script type="template" id="get_row">
    <tr>
        <td>{!! Form::select('countries[{repl_index}][country]',[],null,['class' => 'form-control select_for_countries']) !!}</td>
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