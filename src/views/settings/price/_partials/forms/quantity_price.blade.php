<div class="col-md-12">
    <div class="col-md-4">
        Display result as
    </div>
    <div class="col-md-2">
        {!! Form::radio('qty_option','select',true,['class' => 'select-display-type']) !!} Select menu
    </div>
    <div class="col-md-2">
        {!! Form::radio('qty_option','radio',null,['class' => 'select-display-type']) !!} Radio
    </div>
    <div class="col-md-2">
        {!! Form::radio('qty_option','text',null,['class' => 'select-display-type']) !!} Text
    </div>
</div>
<div class="col-md-12 display-box">
    <div class="col-md-6">
        <div class="col-md-12 qty-box">
            <div class="row">
                <div class="col-md-6">
                    <label>
                        Quantity :
                    </label>
                    <input type="text" class="form-control qty-inputs" name="qty[0][qty]"/>
                </div>
                <div class="col-md-4">
                    <label>
                        Price :
                    </label>
                    <input type="text" class="form-control price-inputs" name="qty[0][price]"/>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="javascript:void(0)" class="add-new-qty"><i class="fa fa-plus"></i> add new</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-6 render-box">

        </div>
        <div class="col-md-6 calculation">

        </div>
    </div>
</div>

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
                    $('.render-box').append('<label><input type="radio" class="calculate-radio" name="price" value="' + price[i].value + '" /> ' + qtyArr[i].value + '</label>');
                }
            }
        }

        $("body").on('change', '.select-display-type', function () {
            var type = $(this).val();
            generate(type);
        });

        var qty = '{!! (isset($data['qty']) && count($data['qty'])) ? count($data['qty']) : 0 !!}';
        $("body").on('click', '.add-new-qty', function () {
            qty++;
            var html = '<div class="row">\n' +
                '            <div class="col-md-6">\n' +
                '                <label>\n' +
                '                    Quantity :\n' +
                '                </label>\n' +
                '                <input type="text" class="form-control qty-inputs" name="qty[0][qty]"/>\n' +
                '            </div>\n' +
                '            <div class="col-md-4">\n' +
                '                <label>\n' +
                '                    Price :\n' +
                '                </label>\n' +
                '                <input type="text" class="form-control price-inputs" name="qty[0][price]"/>\n' +
                '            </div>\n' +
                '            <div class="col-md-2">\n' +
                '                <a href="javascript:void(0)" class="btn btn-danger btn-delete-row"><i class="fa fa-trash"></i></a>\n' +
                '            </div>\n' +
                '        </div>'
            $('.qty-box').append(html);

            var type = $('input[name=qty_option]:checked').val();
            generate(type);
        })

        $("body").on('input', '.qty-inputs', function () {
            var type = $('input[name=qty_option]:checked').val();
            generate(type);
        });
        $("body").on('input', '.price-inputs', function () {
            var type = $('input[name=qty_option]:checked').val();
            generate(type);
        })

        $("body").on('click', '.btn-delete-row', function () {
            $(this).parent().parent().remove();
            var type = $('input[name=qty_option]:checked').val();
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

    })
</script>