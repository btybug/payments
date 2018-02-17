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
            <button class="btn btn-success pull-left attributes-modal" data-role="master">Get Master attribute
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
                                    @foreach($attributes as $attribute)
                                <div class="checkbox">
                                    <label for="checkboxes-{!! $attribute->id !!}">
                                        <input type="checkbox" name="{!! $attribute->type !!}" id="checkboxes-{!! $attribute->id !!}" value="{!! $attribute->slug !!}">
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
    .tab-icon{
        background-color: transparent;
    }
    .nav-pills>li>a{
        background-color: #b8b8b8;
    }
    .child.nav-pills>li {
         float: none !important;
    }



</style>

<script type="template" id="tab-menu">
    <li class="tab-icon" data-tab="{tab}"><a href="#tab_{tab}" data-toggle="pill">{title}</a>
        <button type="button" data-id="{tab}" class="btn btn-info add-tab-menu-child attributes-modal" data-role="children"><i class="fa fa-plus"></i>
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
                            <label class="col-md-4 control-label" for="name-{id}">Option Name</label>
                            <div class="col-md-8">
                                <input id="name-{id}" name="{id}[optionName]" type="text" placeholder="placeholder" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-4 control-label" for="price-{id}">Price</label>
                            <div class="col-md-8">
                                <input id="price-{id}" name="{id}[price]" type="number" min="0" placeholder="enter price" class="form-control input-md">
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


<script>
    $(function () {
        $('body').on('click','.attributes-modal',function () {
            var role=$(this).attr('data-role');
            $('#myModal').modal('toggle');
            var Main_id=$(this).attr('data-id');
            $('form').attr('data-depended',role);
            $('form').attr('data-depended-id',Main_id);
        });
        $('form').submit(function (e) {
            console.log($(this).attr('data-depended'));
            var role=$(this).attr('data-depended');
            var Main_id=$(this).attr('data-depended-id');
            var tContentId,tMenuId,menuSelector;
            switch (role){
                case 'master':tContentId='#tab-content'; tMenuId='#tab-menu';menuSelector='#tabMenuItems';break;
                case 'children':tContentId='#tab-content-depended'; tMenuId='#tab-menu-child'; menuSelector= $('body').find('[data-tab='+Main_id+'] ul');break;
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