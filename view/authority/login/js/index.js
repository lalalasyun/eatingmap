$(function () {
    $("#login_btn").click(async function () {
        let account = $('#id').val();
        let pass = $('#pass').val();
        let json = { "account": account, "password": pass };
        get_user_account(json);
    })

    $(".box5").keypress(function (e) {
        if (e.keyCode == 13) {
            // ここに処理を記述
            console.log("enter");
            let account = $('#id').val();
            let pass = $('#pass').val();
            let json = { "account": account, "password": pass };
            get_user_account(json);

        }
    });

    function get_user_account(json) {
        let account = null;
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async: false,
            type: 'POST',
            url: `${data_list.apiUrl}/user/login`,
            data: JSON.stringify(json),
        }).done(function (data) {
            if (data.code) {
                var ref = document.referrer;
                console.log(ref)
                window.location.href = `/view/authority/login/index.php?user_account_id=${data.data.id}&ref=${ref}`;
            } else {
                $('#pass').val("");
                $('#err_mess').load('/view/authority/login/main/err_message.html');
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
        return account;
    }

})