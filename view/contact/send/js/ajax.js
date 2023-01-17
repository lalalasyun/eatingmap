let shop_name = "";
$(function () {

    $(document).ready(function () {
        const id = user_account_id;
        if (!id) {
            $('#user_name').val("guest");
        } else {
            $('#add_emp').removeClass("d-none");
            $('#del_emp').removeClass("d-none");
            get_user(id);
            if (shop_id) {
                $('#add_emp').addClass("d-none");
            }else{
                $('#del_emp').addClass("d-none");
            }
        }
    });
    function get_user(id) {
        $.ajax({
            type: 'get',
            url: `${data_list.apiUrl}/user/${id}`,
        }).done(function (data) {
            if (data.code) {
                $('#user_name').val(data.data.name);
                $('#user_name').attr('readonly',true);
            } else {
                $('#user_name').val("guest");
            }
            get_shop(shop_id);
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
    }
    function get_shop(id) {
        if (!id) return;
        $("#shop_id").val(id);
        $.ajax({
            type: 'get',
            url: `${data_list.apiUrl}/api/shop/index.php?id=${id}`,
        }).done(function (data) {
            shop_name = data.data.name;
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
    }
})