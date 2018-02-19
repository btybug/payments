@php
    $data = get_qty_data();
    $slug = str_replace('-', '_', \Request::route("slug"));
$attributesRepossitory=new \BtyBugHook\Payments\Repository\AttributesRepository();
$attributes=$attributesRepossitory->getAll();
@endphp


<div class="col-md-12">

    <div class="col-md-9">
        <div class="col-md-12 m-t-15" style="    margin-bottom: 9px;
    margin-top: 7px;">
            <button class="btn btn-success pull-left" data-toggle="modal" data-target="#masterModal">Get Master
                attribute
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
        <div class="tab-pane ">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="panel-title">
                                Preview
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="background-color: #70a98d">
                    <div class="col-md-12">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                @foreach($attributes as $attribute)
                                    <div class="checkbox">
                                        <label for="checkboxes-{!! $attribute->id !!}">
                                            <input type="checkbox" data-type="{!! $attribute->type !!}"
                                                   name="{!! $attribute->type !!}"
                                                   id="checkboxes-{!! $attribute->id !!}"
                                                   value="{!! $attribute->slug !!}">
                                            {!! $attribute->name !!}
                                        </label>
                                    </div>
                                @endforeach
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
<div class="modal fade" id="masterModal" role="dialog">
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
                            <label class="col-md-4 control-label" for="master-name-input">Name</label>
                            <div class="col-md-4">
                                <input id="master-name-input" name="master_name" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success add-new-options-panel crate-new-master">Save</button>
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

    .tab-icon {
        position: relative;
        background-color: #b8b8b8;
    }

    .tab-icon button {
        position: absolute;
        right: 0;
        top: 0;
        padding: 9px 12px;
        color: white;
    }

    .tab-icon.child {
        background-color: antiquewhite;
        width: 80%;
        float: right;
    }

    .tab-icon {
        background-color: transparent;
    }

    .nav-pills > li > a {
        background-color: #b8b8b8;
    }

    .child.nav-pills > li {
        float: none !important;
    }


</style>

<script type="template" id="tab-menu">
    <li class="tab-icon" data-tab="{tab}"><a href="#tab_{tab}" data-toggle="pill">{title}</a>
        <button type="button" data-id="{tab}" class="btn btn-info add-tab-menu-child attributes-modal"
                data-role="children"><i class="fa fa-plus"></i>
        </button>
        <ul class="nav tab-icon child nav-pills">

        </ul>
        <div class="clearfix"></div>
    </li>
</script>
<script type="template" id="tab-menu-child">
    <li><a href="#tab_{tab}" data-toggle="pill">{title}</a></li>
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
                </div>
            </div>
            <div class="panel-body" style="background-color: #70a98d">
                <div class="col-md-12 attributes-main-area-{id}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-6 control-label" for="name-{id}">Select Field Type</label>
                            <div class="col-md-6">
                                <select class="form-control condition-option master-type" data-id="{id}">
                                    <option>Select Type</option>
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="select">Select box</option>
                                    <option value="text">Text</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" data-place="{id}">

                        </div>
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
<script type="template" id="tab-content-depended">
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
                    <button type="button" data-id="{id}" class="btn btn-info add-secondary-condition"><i
                                class="fa fa-plus"></i></button>
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
                <button type="button" class="btn btn-danger delete-secondary-condition"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
    </div>
</script>
<script type="template" id="master-button">
    <button class="btn btn-info attributes-modal">Select Attribute</button>
</script>

{{--form components--}}
<script type="template" id="component-label">
    <label class="col-md-4 control-label" for="{label-for}">{text}</label>
</script>
<script type="template" id="component-checkbox">

    <div class="checkbox">
        <label for="checkbox-{id}">
            <input type="checkbox" name="checkboxes" id="checkbox-{id}" value="1">
            Option one
        </label>
    </div>
</script>
<script type="template" id="component-select">
    <select id="selectbasic" name="selectbasic" class="form-control">
        {options}
    </select>
</script>
<script type="template" id="component-select-options">
    <option value="{value}">{text}</option>
</script>
<script type="template" id="component-radio">
    <div class="radio">
        <label for="radios-0">
            <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
            Option one
        </label>
    </div>
</script>
{{--js functional--}}
<script>
    $(function () {
        $('body').on('click', '.crate-new-master', function () {
            var id = Date.now();
            var tabMenu = $('#tab-menu').html();
            var tabContent = $('#tab-content').html();
            var attrMain = $('#attributes-main').html();
            tabContent = tabContent.replace('{content}', attrMain);
            tabContent = tabContent.replace(/{id}/g, id);
            tabMenu = tabMenu.replace(/{tab}/g, id);
            tabMenu = tabMenu.replace(/{title}/g, $('#master-name-input').val());
            $('#tabMenuItems').append(tabMenu);
            $('#tabContentItems').append(tabContent);
            $('#masterModal').modal('toggle');
        });
        $('body').on('change', '.master-type', function () {
            var value = $(this).val();
            var id=$(this).attr('data-id');
            $('body').find('[data-place='+id+']').empty();
            if (value=='radio' || value=='checkbox' || value=='select'){
                var html=$('#master-button').html();
                $('body').find('[data-place='+id+']').html(html);

            }
        });

        $('body').on('click', '.attributes-modal', function () {
            var role = $(this).attr('data-role');
            $('#myModal').modal('toggle');
            var Main_id = $(this).attr('data-id');
            $('form').attr('data-depended', role);
            $('form').attr('data-depended-id', Main_id);
        });
        $('form').submit(function (e) {
            var role = $(this).attr('data-depended');
            var Main_id = $(this).attr('data-depended-id');
            var tContentId, tMenuId, menuSelector;
            switch (role) {
                case 'master':
                    tContentId = '#tab-content';
                    tMenuId = '#tab-menu';
                    menuSelector = '#tabMenuItems';
                    break;
                case 'children':
                    tContentId = '#tab-content-depended';
                    tMenuId = '#tab-menu-child';
                    menuSelector = $('body').find('[data-tab=' + Main_id + '] ul');
                    break;
            }

            e.preventDefault();
            var data = $(this).serializeArray();
            $.each(data, function (key, attr) {
                var id = Date.now();
                var tabMenu = $(tMenuId).html();
                var tabContent = $(tContentId).html();
                var attrMain = $('#attributes-main').html();
                tabContent = tabContent.replace('{content}', attrMain);
                tabContent = tabContent.replace(/{id}/g, id);
                tabMenu = tabMenu.replace(/{tab}/g, id);
                tabMenu = tabMenu.replace(/{title}/g, attr.value);
                console.log($(attr).attr('data-type'));
                $(menuSelector).append(tabMenu);
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
        $('body').on('click', '.add-secondary-condition', function () {
            var Main_id = $(this).attr('data-id');
            var attrSecondary = $('#secondary-sub-attributes').html();
            $('body').find('[data-area=' + Main_id + ']').append(attrSecondary);
        });

        $('body').on('click', '.delete-secondary-condition', function () {
            $(this).parents('.row').first().remove();
        });
        // $('body').on('click', '.add-tab-menu-child', function () {
        //     var id = Date.now();
        //     var Main_id=$(this).attr('data-id');
        //     var ch_menu=$('#tab-menu-child').html();
        //     ch_menu=ch_menu.replace(/{tab}/g, id);
        //     var tabContent = $('#tab-content').html();
        //     var attrMain = $('#attributes-main').html();
        //     tabContent = tabContent.replace('{content}', attrMain);
        //     tabContent = tabContent.replace(/{id}/g, id);
        //
        //     $('#tabContentItems').append(tabContent);
        //     $('body').find('[data-tab='+Main_id+'] ul').append(ch_menu);
        // });

    });
</script>