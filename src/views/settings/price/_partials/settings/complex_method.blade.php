@php
    $data = get_qty_data();
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp


<div class="col-md-12">

    <div class="col-md-9">
        <div class="col-md-12 m-t-15" style="    margin-bottom: 9px;
    margin-top: 7px;">
            <button class="btn btn-success pull-left" data-toggle="modal" data-target="#myModal">Get Master attribute
            </button>
        </div>
        <div class="col-md-4">
            <ul class="nav nav-pills nav-stacked col-md-12" id="tabMenuItems">

            </ul>
        </div>
        <div class="col-md-8 tab-content" id="tabContentItems">

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
<style>
    .attributes-conditional-area {
        padding: 7px;
        margin: 7px;
        box-shadow: -3px 3px 16px;
        background-color: #58a27e;
    }
    .tab-icon{
        position: relative;
        background-color: #b8b8b8;
    }
    .tab-icon button{
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        color: white;
    }
    .tab-icon .child{
        background-color: antiquewhite;
        width: 80%;
        float: right;
    }

</style>

<script type="template" id="tab-menu">
    <li class="tab-icon"><a href="#tab_{tab}"  data-toggle="pill">{title}</a><button type="button" class="btn btn-info"><i class="fa fa-plus"></i></button>

    </li>
</script>
<script type="template">
    <li class="tab-icon child" ><a href="#tab_{tab}" data-toggle="pill">Select</a></li>
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
                            <button type="button" data-id="{id}" class="btn btn-info add-main-attributes"><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <h4 class="panel-title">

                </h4>

            </div>
            <div class="panel-body" style="background-color: #70a98d">
                <div class="col-md-12 attributes-main-area-{id}">
                    {content}
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
<script type="template" id="attributes-main">
    <div class="col-md-12 row attributes-conditional-area">
        <div class="col-md-6">
            <select class=" form-control condition-option">
                <option>Red</option>
                <option>Blue</option>
                <option>Black</option>
            </select>
        </div>
        <div class="col-md-6">
            <select class="form-control condition-types" data-id="{id}">
                <option value="always">Always display</option>
                <option value="conditional">Conditional</option>
            </select>
        </div>
        <div class="row sub-attributes-{id}">

        </div>
    </div>
</script>
<script type="template" id="first-sub-attributes">
    <div class="col-md-2">
        Hide If
    </div>
    <div class="col-md-12" data-area="{id}">
        <div class="row">
            <div class="col-md-4">
                <select class="form-control">
                    <option>Field 1</option>
                    <option>Field 2</option>
                    <option>Field 3</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control">
                    <option>And</option>
                    <option>Or</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control">
                    <option>Field 1</option>
                    <option>Field 2</option>
                    <option>Field 3</option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="pull-right">
                    <button type="button" data-id="{id}" class="btn btn-info add-secondary-condition"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>

</script>
<script type="template" id="secondary-sub-attributes">

    <div class="row">
        <div class="col-md-4">
            <select class="form-control">
                <option>Field 1</option>
                <option>Field 2</option>
                <option>Field 3</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>And</option>
                <option>Or</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control">
                <option>Field 1</option>
                <option>Field 2</option>
                <option>Field 3</option>
            </select>
        </div>
        <div class="col-md-2">
            <div class="pull-right">
                <button type="button"  class="btn btn-danger delete-secondary-condition"><i class="fa fa-minus"></i></button>
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
                var attrMain = $('#attributes-main').html();
                tabContent = tabContent.replace('{content}', attrMain);
                tabContent = tabContent.replace(/{id}/g, id);
                tabMenu = tabMenu.replace(/{tab}/g, id);
                tabMenu = tabMenu.replace(/{title}/g, attr.value);
                $('#tabMenuItems').append(tabMenu);
                $('#tabContentItems').append(tabContent);
            });
            $(this).find("input[type=checkbox]").attr('checked', false);
            $('#myModal').modal('toggle');

        });

        $('body').on('change', '.condition-types', function () {
            var value = $(this).val();
            var Main_id = $(this).attr('data-id');
            var id = Date.now();
            if (value == 'conditional') {
                var html = $('#first-sub-attributes').html();
                html = html.replace(/{id}/g, id);
                $('body').find('.sub-attributes-' + Main_id).html(html);
            } else {
                $('body').find('.sub-attributes-' + Main_id).empty();
            }
        });

        $('body').on('click', '.add-main-attributes', function () {
            var Main_id = $(this).attr('data-id');
            var id = Date.now();
            var attrMain = $('#attributes-main').html();
            attrMain = attrMain.replace(/{id}/g, id);
            $('body').find('.attributes-main-area-' + Main_id).append(attrMain);
        });
        $('body').on('click','.add-secondary-condition',function () {
            var Main_id = $(this).attr('data-id');
            var attrSecondary = $('#secondary-sub-attributes').html();
            $('body').find('[data-area='+Main_id+']').append(attrSecondary);
        });

        $('body').on('click','.delete-secondary-condition',function () {
            $(this).parents('.row').first().remove();
        })
    });
</script>