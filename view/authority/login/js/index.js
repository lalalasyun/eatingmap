$(function () {
    $("#login_btn").click(async function () {

        const account = $('#id').val();
        const pass = $('#pass').val();
        const json = { "account": account, "password": pass };
        console.log(json)
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            crossDomain: true,
            type: 'POST',
            url: `https://code.lalalasyun.tech/proxy/8080/`,
            data: JSON.stringify(json),
            xhrFields: {
                withCredentials: true
            },
        }).done(function (data) {
            console.log(data)
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown)
            });
    })

})