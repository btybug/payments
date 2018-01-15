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
};