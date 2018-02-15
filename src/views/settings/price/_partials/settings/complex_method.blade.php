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
            <ul class="nav nav-pills nav-stacked col-md-12" id="tabMenuItems">
                <li class="active"><a href="#tab_a" data-toggle="pill">Radio</a></li>
            </ul>
        </div>
        <div class="col-md-8 tab-content" id="tabContentItems">
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
            <form class="attributes-import">
                <div class="modal-body">
                    <div class="row ">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="checkboxes">Attributes</label>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label for="checkboxes-0">
                                        <input type="checkbox" name="radio" id="checkboxes-0" value="Radio">
                                        Radio
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        <input type="checkbox" name="select" id="checkboxes-1" value="Select">
                                        Select
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-2">
                                        <input type="checkbox" name="text" id="checkboxes-2" value="Text">
                                        Text
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success add-new-options-panel">Save
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>


<script type="template" id="tab-menu">
    <li class=""><a href="#tab_{tab}" data-toggle="pill">{title}</a></li>
</script>
<script type="template" id="tab-content">
    <div class="tab-pane " id="tab_{id}">
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
</script>


<script>
    $(function () {
        $('form').submit(function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            $.each(data, function (key, attr) {
                var id = Date.now();
                var tabMenu = $('#tab-menu').html();
                var tabContent = $('#tab-content').html();
                tabContent = tabContent.replace(/{id}/g, id);
                tabMenu = tabMenu.replace(/{tab}/g, id);
                tabMenu = tabMenu.replace(/{title}/g, attr.value);
                $('#tabMenuItems').append(tabMenu);
                $('#tabContentItems').append(tabContent);
            });
            $(this).find("input[type=checkbox]").attr('checked',false);
            $('#myModal').modal('toggle');

        });
    });
</script>