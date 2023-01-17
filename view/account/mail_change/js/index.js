$(function () {
    $("html").keypress(function (e) {
        if (e.keyCode == 13) {
            change();
        }
    });

    $('#change_btn').click(function (e) { 
        change();
    });

    async function change(){
        $('#input_area').validate().form();
        await new Promise(s => setTimeout(s, 500));
        
        if(!$('#input_area').validate().form())return;
        
        const json = {
            id: user_account_id,
            mail: $('#mail').val()
        }

        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async: false,
            type: 'PUT',
            url: `${data_list.apiUrl}/user/`,
            data: JSON.stringify(json)
        }).done(function (data) {
            if (data.code) {
                window.location.href = "/view/account/mail_change/index.php?code=1";
            } else {
                window.location.href = "/view/account/mail_change/index.php?code=0";
            }
        })// Ajaxリクエストが失敗した場合
        .fail(function (XMLHttpRequest, textStatus, errorThrown) {
            window.location.href = `/view/error/${XMLHttpRequest.status}`;
        });
    }


});