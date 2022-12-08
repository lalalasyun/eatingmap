$(function () {
    $("#confirm").click(function () {
        const api = "https://app.eatingmap.fun/api/geolocation/index.php?address=";
        $.ajax({
            type: 'get',
            url: `${api}${$('#address').val()}`,
        }).done(function (data) {
            console.log(data);
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/web/view/error/500';
            });
    })
});

