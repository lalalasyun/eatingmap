$(function () {
    $("#mail_send_btn").click(async function () {
        const conf = JSON.parse(await load_conf());

        const account = $('#id').val();
        const mail = $('#mail').val()
        const json = { "account": account, "mail": mail }
        console.log(json)
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            type: 'POST',
            url: `http://${conf.api_url}:${conf.api_port}/user/mail`,
            data: JSON.stringify(json)
        });
    })

})

async function load_conf() {

    var result = $.ajax({
        type: 'GET',
        url: 'http://10.42.96.32/web/view/config/config.json',
        dataType: "json",
        async: false
    }).responseText;
    return result;
}