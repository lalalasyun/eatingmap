$(function () {
    $("#login_btn").click(async function () {
        const account = $('#id').val();
        const pass = $('#pass').val();
        const json = { "account": account, "password": pass };
        let id = get_user_account(json);
        set_session(id);
    })

    function get_user_account(json){
        let account = null;
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async : false,
            type: 'POST',
            url: `https://app.eatingmap.fun/user/login`,
            data: JSON.stringify(json),
        }).done(function (data) {

            if (data.code) {
                account = data.data.id;
                window.sessionStorage.setItem(['user_account_id'], [account]);
            } else {
                $('#pass').val("");
                $('#err_mess').load('main/err_message.html');
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/web/view/error/500';
            });
        return account;
    }

    function set_session(id){
        let url = "https://app.eatingmap.fun/api/session/get/index.php";
        let data = get(url,{"id":id})
        if(data.code){
            window.sessionStorage.setItem(['key'], [data.key]);
            window.location.href = '/web/view/main/home/';
        }else{
            window.location.href = '/web/view/error/500';
        }
    }

})