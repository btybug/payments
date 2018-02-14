@php
    $data = get_qty_data();
    $slug = str_replace('-', '_', \Request::route("slug"));
@endphp
<div class="col-md-12">
<div class="col-md-9">
    <div>
        <div class="col-md-12 m-t-15">
            <a class="btn btn-success">Create new Master attribute</a>
        </div>
        <div class="col-md-12 m-t-15">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        Attribute name here
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="attr_content">
                        <div class="col-md-4 left">
                            <div class="col-md-6">
                                <p>Display result as</p>
                                <div class="render-box">
                                    <div>
                                        <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio1">
                                        <label for="attrradio1">radio</label>
                                    </div>
                                    <div>
                                        <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio2">
                                        <label for="attrradio2">radio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select name="{{ $slug.'_price[option0][qty_option]' }}" id="" class="form-control select-display-type">
                                    <option value="radio">Radio</option>
                                    <option value="select">Select</option>
                                    <option value="text">Text</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8 right">
                            <div class="col-md-12 ">
                                <div class="col-md-12 qty-box" id="qty-parent">
                                    <div class="row qty_count">
                                        <div class="col-md-6">
                                            <label>
                                                Quantity :
                                            </label>
                                            <div class="quant-btn-inp">
                                            <a href="javascript:void(0)" class="btn btn-primary add-new-qty" data-parent="qty-parent"><i class="fa fa-plus"></i></a>
                                            <input type="text" class="form-control qty-inputs" name="{{$slug}}_price[option0][qty][0][qty]"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                Price :
                                            </label>
                                            <input type="text" class="form-control price-inputs" name="{{$slug}}_price[option0][qty][0][price]"/>
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="panels-area"></div>
    <div>
        <button type="button" class="btn btn-info add-dep-attr"><i class="fa fa-plus"></i>Add depended attribute</button>
    </div>
</div>
    <div class="col-md-3"></div>
    <script type="template" id="attribute-panel">
        <div>
          
            <div class="col-md-12 m-t-15">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            Attribute name here
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="attr_content">
                            <div class="col-md-4 left">
                                <div class="col-md-6">
                                    <p>Display result as</p>
                                    <div class="render-box">
                                        <div>
                                            <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio1">
                                            <label for="attrradio1">radio</label>
                                        </div>
                                        <div>
                                            <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio2">
                                            <label for="attrradio2">radio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select name="{{ $slug.'_price[option0][qty_option]' }}" id="" class="form-control select-display-type">
                                        <option value="radio">Radio</option>
                                        <option value="select">Select</option>
                                        <option value="text">Text</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8 right">
                                <div class="col-md-12 ">
                                    <div class="col-md-12 qty-box" id="qty-parent">
                                        <div class="row qty_count">
                                            <div class="col-md-6">
                                                <label>
                                                    Quantity :
                                                </label>
                                                <div class="quant-btn-inp">
                                                    <a href="javascript:void(0)" class="btn btn-primary add-new-qty" data-parent="qty-parent"><i class="fa fa-plus"></i></a>
                                                    <input type="text" class="form-control qty-inputs" name="{{$slug}}_price[option0][qty][0][qty]"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    Price :
                                                </label>
                                                <input type="text" class="form-control price-inputs" name="{{$slug}}_price[option0][qty][0][price]"/>
                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    {{--{!! Form::model($data,['class' => 'form-horizontal']) !!}--}}
    {{--<div class="col-md-12 m-t-15">--}}
        {{--<a class="btn btn-success">Create new Master attribute</a>--}}
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" role="tab">--}}
                {{--<h4 class="panel-title">--}}
                    {{--Settings--}}
                    {{--{!! Form::submit('save',['class' => 'btn btn-primary pull-right']) !!}--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div class="panel-body just__for_appent">--}}
                {{--<div class="col-md-12">--}}
                    {{--<button type="button" class="btn btn-md btn-primary add_new_copy">Add New</button>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
                {{--<div class="div_for_copy" data-index = '0'>--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="col-md-4">--}}
                            {{--Display result as--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--{!! Form::radio($slug.'_price[option0][qty_option]','select',true,['class' => 'select-display-type']) !!} Select menu--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--{!! Form::radio($slug.'_price[option0][qty_option]','radio',null,['class' => 'select-display-type']) !!} Radio--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--{!! Form::radio($slug.'_price[option0][qty_option]','text',null,['class' => 'select-display-type']) !!} Text--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12 display-box">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="col-md-12 qty-box" id="qty-parent">--}}
                                {{--<div class="row qty_count">--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<label>--}}
                                            {{--Quantity :--}}
                                        {{--</label>--}}
                                        {{--<input type="text" class="form-control qty-inputs" name="{{$slug}}_price[option0][qty][0][qty]"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<label>--}}
                                            {{--Price :--}}
                                        {{--</label>--}}
                                        {{--<input type="text" class="form-control price-inputs" name="{{$slug}}_price[option0][qty][0][price]"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-2">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">--}}
                                {{--<a href="javascript:void(0)" class="add-new-qty" data-parent="qty-parent"><i class="fa fa-plus"></i> add new</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="col-md-6 render-box">--}}

                            {{--</div>--}}
                            {{--<div class="col-md-6 calculation">--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>

<script type="template" id="qty_template">
    <div class="row qty_count">
        <div class="col-md-6">
        <label>
        Quantity :
    </label>
    <input type="text" class="form-control qty-inputs" name="_price[option{repl_main}][qty][{repl}][qty]">
        </div>
        <div class="col-md-4">
        <label>
        Price :
    </label>
    <input type="text" class="form-control price-inputs" name="_price[option{repl_main}][qty][{repl}][price]">
        </div>
        <div class="col-md-2">
        <a href="javascript:void(0)" class="btn btn-danger btn-delete-row"><i class="fa fa-trash"></i></a>
    </div>
    </div>
</script>
<style>
    .div_for_copy{
        padding:5px;
        border:1px solid;
        margin:5px;
    }
    .attr_content{
        color: black;
    }
    .attr_content .left p{
        margin-top: 5px;
    }
    .attr_content .right .bty-btn-add{
        margin-top: 15px;
    }
    .quant-btn-inp{
        display: flex;
    }
    .quant-btn-inp > a{
        margin-right: 5px;
    }
</style>
<script>
    window.onload = function(){
        $("body").delegate(".add_new_copy","click",function(){
        var index = $("div.div_for_copy").length;
       var html = '<div class="div_for_copy" data-index="'+index+'">'+
        '               <div class="col-md-12">'+
        '                   <div class="col-md-4">'+
        '                       Display result as'+
        '                   </div>'+
        '                   <div class="col-md-2">'+
        '                       <input class="select-display-type" checked="checked" name="_price[option'+index+'][qty_option]" type="radio" value="select"> Select menu'+
        '                   </div>'+
            '               <div class="col-md-2">'+
            '                   <input class="select-display-type" name="_price[option'+index+'][qty_option]" type="radio" value="radio"> Radio'+
            '               </div>'+
            '               <div class="col-md-2">'+
            '                   <input class="select-display-type" name="_price[option'+index+'][qty_option]" type="radio" value="text"> Text'+
            '               </div>'+
        '               </div>'+
        '               <div class="col-md-12 display-box">'+
        '                   <div class="col-md-6">'+
        '                       <div class="col-md-12 qty-box" id="qty-parent'+index+'">'+
        '                           <div class="row qty_count">'+
        '                               <div class="col-md-6">'+
        '                                   <label>'+
        '                                       Quantity :'+
        '                                   </label>'+
        '                                   <input type="text" class="form-control qty-inputs" name="_price[option'+index+'][qty][0][qty]">'+
        '                               </div>'+
        '                               <div class="col-md-4">'+
        '                                   <label>'+
        '                                       Price :'+
        '                                   </label>'+
        '                                   <input type="text" class="form-control price-inputs" name="_price[option'+index+'][qty][0][price]">'+
        '                               </div>'+
        '                               <div class="col-md-2">'+
        '                               </div>'+
        '                           </div>'+
        '                       </div>'+
        '                       <div class="col-md-12">'+
        '                           <a href="javascript:void(0)" class="add-new-qty" data-parent="qty-parent'+index+'"><i class="fa fa-plus"></i> add new</a>'+
        '                       </div>'+
        '               </div>'+
        '               <div class="col-md-6">'+
        '                   <div class="col-md-6 render-box">'+
        '                   </div>'+
        '                   <div class="col-md-6 calculation">'+
        '                   </div>'+
        '               </div>'+
        '        </div>'+
        '           <button class=\'btn btn-md btn-danger remove_this pull-right\'>Remove this</button>'+
        '        <div class="clearfix"></div>'+
        '        </div>';

        $(".just__for_appent").append(html);
        });
        $("body").delegate(".remove_this","click",function(){
            $(this).parent().remove();
        });
    }
</script>


<script>
    $(document).ready(function () {
        function generate(type) {
            var qtyArr = $(".qty-box .qty-inputs").serializeArray();
            var price = $(".qty-box .price-inputs").serializeArray();

            if (type == 'select') {
                var selectBox = $('<select id="select-box" class="form-control" />');
                $.each(qtyArr, function (index, value) {
                    selectBox.append($('<option/>', {
                        value: price[index].value,
                        text: value.value
                    }));
                });
                $('.render-box').html(selectBox);

            }

            if (type == 'radio') {
                $('.render-box').html('');
                for (var i = 0; i < qtyArr.length; i++) {
                    $('.render-box').append('<label><input type="radio" class="calculate-radio" name="pricedata" value="' + price[i].value + '" /> ' + qtyArr[i].value + '</label>');
                }
            }
        }

        $("body").on('change', '.select-display-type', function () {
            var type = $(this).val();
            generate(type);
        });

       // var qty = '{!! (isset($data['qty']) && count($data['qty'])) ? count($data['qty']) : 0 !!}';
        $("body").on('click', '.add-new-qty', function () {
            var qty = $(this).parent().parent().children().find("div.qty_count").length;

            var index = $(this).parents("div.div_for_copy").data("index");

            var html = $("#qty_template").html();
            html = html.replace('{repl_main}',index);
            html = html.replace('{repl}',qty);
            var id = $(this).data("parent");
            $("#"+id).append(html);
            var type = $(this).parents("div.div_for_copy .select-display-type:checked").val();
            generate(type);
        })

        $("body").on('input', '.qty-inputs', function () {
            var type = $('.select-display-type:checked').val();
            generate(type);
        });
        $("body").on('input', '.price-inputs', function () {
            var type = $('.select-display-type:checked').val();
            generate(type);
        })

        $("body").on('click', '.btn-delete-row', function () {
            $(this).parent().parent().remove();
            var type = $('.select-display-type:checked').val();
            generate(type);
        })

        $("body").on('change', '.calculate-radio', function () {
            var val = $(this).val();
            $('.calculation').html(val);
        });
        $("body").on('change', '#select-box', function () {
            var val = $(this).val();
            $('.calculation').html(val);
        });
        $('.add-dep-attr').on('click',function () {
            var html=$('#attribute-panel').html();
            $('#panels-area').append(html);
        });
    });
</script>