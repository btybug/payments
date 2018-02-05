$(function () {
    $('.submit-button').on('click',function () {
        $(this).parent('form').submit();
    })
})