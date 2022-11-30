$(function () {
    $("#mail_send_btn").click(async function () {
        const account = $('#id').val();
        const mail = $('#mail').val()
        const json = { "account": account, "mail": mail }
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            type: 'POST',
            url: `https://app.eatingmap.fun/user/mail`,
            data: JSON.stringify(json)
        }).done(function (data) {
            console.log(data);
            if(data.code){
                window.location.href = `/web/view/authority/mail_confirm?id=1`;
            }else{
                window.location.href = `/web/view/authority/mail_confirm`;
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest, textStatus, errorThrown)
                window.location.href = `/web/view/error/${XMLHttpRequest.status}`;
            });
    })

})