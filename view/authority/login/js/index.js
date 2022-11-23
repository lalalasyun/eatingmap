$(function () {
    $("#login_btn").click(async function () {
        const account = $('#id').val();
        const pass = $('#pass').val();
        const json = { "account": account, "password": pass };

        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            type: 'POST',
            url: `https://app.eatingmap.fun/user/login`,
            data: JSON.stringify(json),
        }).done(function (data) {

            if (data.code) {
                const user_account_data = data.data;
                window.sessionStorage.setItem(['user_account_id'], [user_account_data.id]);
                window.location.href = `.?user_account_id=${user_account_data.id}&shop_id=${user_account_data.shop_id}`;
            } else {
                $('#pass').val("");
                $('#err_mess').load('main/err_message.html');
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/web/view/error/500';
            });

    })

})