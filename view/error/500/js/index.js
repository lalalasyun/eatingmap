//https://shibe.online/api/shibes?count=1&urls=true&httpsUrls=true
//shibainu api

$(function () {
    $.ajax({
        type: 'GET',
        url: `https://shibe.online/api/shibes?count=1&urls=true&httpsUrls=true`,
    }).done(function (data) {
        $('.image').children('img').attr('src', data[0]);
        console.log(data)
    })
        // Ajaxリクエストが失敗した場合
        .fail(function (XMLHttpRequest, textStatus, errorThrown) {
            
        });
});