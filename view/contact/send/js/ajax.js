$(function () {
    $(document).ready(function () {
        //送信ボタンが押されていれば実行
        if(json){
            send_form(json);
            window.location.href = '/view/contact/completion/';
            return;
        }
        const id = user_account_id;
        console.log(id)
        if (!id) {
            $('#user_name').val("guest");
        } else {
            $('#add_emp').removeClass("d-none");
            get_user(id);
        }
    });
    function get_user(id){
        $.ajax({
            type: 'get',
            url: `https://app.eatingmap.fun/user/${id}`,
        }).done(function (data) {
            console.log(data)
            if (data.code) {
                $('#user_name').val(data.data.name);
                $("#user_name").prop("disabled", true);
            } else {
                $('#user_name').val("guest");
            }
            get_shop(data.data.shop_id);
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
    }
    function get_shop(id){
        if(!id)return;
        $.ajax({
            type: 'get',
            url: `https://app.eatingmap.fun/api/shop/index.php?id=${id}`,
        }).done(function (data) {
            $('#del_emp').removeClass("d-none");
            $('#add_emp').addClass("d-none");
            $('#i_shop_name').val(data.data);
            $("#i_shop_name").prop("disabled", true);
            
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
    }
    function send_form(json){
        //ajax の処理
    }
})