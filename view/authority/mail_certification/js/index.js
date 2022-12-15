$(function () {
    $("#mail_send_btn").click(async function () {
        const account = $('#id').val();
        const mail = $('#mail').val()
        if(account == "" || mail == "")return;
        screenLock();
        const json = { "account": account, "mail": mail }
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            type: 'POST',
            url: `https://app.eatingmap.fun/user/mail`,
            data: JSON.stringify(json),
        }).done(function (data) {
            console.log(data);
            delete_dom_obj()
            if (data.code == 1) {
                window.location.href = `/view/authority/mail_certification/index.php?code=1`;
            } else {
                window.location.href = `/view/authority/mail_certification/index.php?code=0`;
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest, textStatus, errorThrown)
                window.location.href = `/view/error/${XMLHttpRequest.status}`;
            });
    })

})