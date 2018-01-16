window.onload = function(){
    $('body').delegate('.is_unit','click',function () {
        var is_unit = $(this).val();
        var arr = $(this).attr("name").split("_");
        var id = arr[arr.length-1];
        if(is_unit === '1'){
            $(this).parent().parent().children('select.custom_remove').removeAttr('name').addClass('custom_hidden');
            $(this).parent().parent().children("div.custom_show").removeClass('custom_hidden');
        }else {
            $(this).parent().parent().children("select.custom_remove").attr('name','area'+id).removeClass('custom_hidden');
            $(this).parent().parent().children("div.custom_show").addClass('custom_hidden');
        }
    });

    $('body').delegate(".custom_add_new_desc","click",function(){
        var for_append = $(".for_append");

        var key = for_append.children(".single_setting").last().data("id");
        key += 1;
        var html = '' +
            '<div class="single_setting" data-id="'+key+'">' +
                '<label for="area6[titles]['+key+']">Title</label>Title</label>' +
                '<input type="text" placeholder="Insert title" name="area6[titles]['+key+']" id="area6[titles]['+key+']" class="form-control">' +
                '<label for="area6[descriptions]['+key+']">Content</label>' +
                '<textarea name="area6[descriptions]['+key+']" id="area6[descriptions]['+key+']" class="form-control"></textarea>' +
            '</div>';

        for_append.append(html);
    });
};