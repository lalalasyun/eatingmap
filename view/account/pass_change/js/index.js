$(function () {
    $('.form-open-eye-mark').click(function (e) { 
        $(this).siblings('input').attr('type','text');
        $(this).hide();
        $(this).siblings('.form-close-eye-mark').show();
    });
    $('.form-close-eye-mark').click(function (e) { 
        $(this).siblings('input').attr('type','password');
        $(this).hide();
        $(this).siblings('.form-open-eye-mark').show();
    });
    $(document).ready(function () {
        let params = (new URL(document.location)).searchParams;
        if (!params.get('pass3')) return;
        const json = {
            id: user_account_id,
            password: params.get('pass3')
        }

        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async: false,
            type: 'PUT',
            url: `${data_list.apiUrl}/user`,
            data: JSON.stringify(json),
        }).done(function (data) {
            if (data.code) {
                window.location.href = "/view/account/pass_change/index.php?code=1";
            } else {
                window.location.href = "/view/account/pass_change/index.php?code=0";
            }
        })// Ajaxリクエストが失敗した場合
        .fail(function (XMLHttpRequest, textStatus, errorThrown) {
            window.location.href = `/view/error/${XMLHttpRequest.status}`;
        });
    });


});