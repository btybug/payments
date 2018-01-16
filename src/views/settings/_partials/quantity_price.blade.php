<div class="col-md-12 qty-box">
    <div class="row">
        <div class="col-md-6">
            <label>
                Quantity :
            </label>
            <input type="text" class="form-control" name="qty" />
        </div>
        <div class="col-md-6">
            <label>
                Price :
            </label>
            <input type="text" class="form-control" name="price" />
        </div>
    </div>

</div>
<div class="col-md-12">
    <a href="javascript:void(0)" class="add-new-qty"><i class="fa fa-plus"></i> add  new</a>
</div>

<script>
    $(document).ready(function () {
        $("body").on('click','.add-new-qty',function () {
            var html = '<div class="row">\n' +
                '        <div class="col-md-6">\n' +
                '            <label>\n' +
                '                Quantity :\n' +
                '            </label>\n' +
                '            <input type="text" class="form-control" name="qty" />\n' +
                '        </div>\n' +
                '        <div class="col-md-6">\n' +
                '            <label>\n' +
                '                Price :\n' +
                '            </label>\n' +
                '            <input type="text" class="form-control" name="price" />\n' +
                '        </div>\n' +
                '    </div>'
            $('.qty-box').append(html);
        })
    })
</script>