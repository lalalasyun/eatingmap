$(function () {

    $(document).ready(function () {
        const id = user_account_id;
        if (!id) {
            $('#user_name').html("error");
            $('#user_point').html("error");
        } else {
            $.ajax({
                type: 'get',
                url: `https://app.eatingmap.fun/user/${id}`,
            }).done(function (data) {
                console.log(data)
                if (data.code) {
                    $('#user_name').html(data.data.account);
                    $('#user_point').html(data.data.point);
                } else {
                    $('#user_name').html("guest");
                    $('#user_point').html("error");
                }

            })
                // Ajaxリクエストが失敗した場合
                .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                    window.location.href = '/view/error/500';
                });
        }

    });

})