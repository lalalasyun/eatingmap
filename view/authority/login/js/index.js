$(function () {
    $("#login_btn").click(async function () {
        const account = $('#id').val();
        const pass = $('#pass').val();
        const json = { "account": account, "password": pass };
        get_user_account(json);
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
            console.log(data)
            if (data.code) {
                account = data.data.id;
                window.sessionStorage.setItem(['user_account_id'], [account]);
                window.location.href = `/web/view/authority/login/index.php?user_account_id=${account}`;
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

})