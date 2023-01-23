$(function () {
    $('#heads_btn').click(function (e) {
        $("#change_area").find('.overflow-div').hide();
        $('#heads_area').show();
    });
    $('#clothes_btn').click(function (e) {
        $("#change_area").find('.overflow-div').hide();
        $('#clothes_area').show();
    });
    $('#backs_btn').click(function (e) {
        $("#change_area").find('.overflow-div').hide();
        $('#backs_area').show();
    });

    $('.radio').change(function (e) {
        $(`#${$(this).data('item_id')}`).attr('src', $(this).data('item_image'));
    });

    $('#back_btn').click(function (e) { 
        var select = confirm("変更を破棄しますか？");
        if (select) {
            window.location.href = `/mypage`;
        }
    });
    $('#change_btn').click(function (e) {
        $('#set_form').submit();
    });
    

});

