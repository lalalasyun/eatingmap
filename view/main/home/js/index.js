$(function () { 
    $(document).ready(function () {
        const id = user_account_id;
        if (!id) {
            $('#user_name').html("guest");
        } else {
            $.ajax({
                type: 'get',
                url: `https://app.eatingmap.fun/user/${id}`,
            }).done(function (data) {
                console.log(data)
                if (data.code) {
                    $('#user_name').html(data.data.name);
                } else {
                    $('#user_name').html("guest");
                }

            })
                // Ajaxリクエストが失敗した場合
                .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                    window.location.href = '/view/error/500';
                });

        }
    });
    $("#search_btn").click(function() {
        let name = $("#search_name").val();
        let pref = $("#select-pref").val();
        let city = $("#select-city").val();
        let price = $("#price").val()
        window.location.href = `/view/search/name?code=1&name=${name}&pref=${pref}&city=${city}&price=${price}`;
    });
    $(".user_icon2").click(function() {
        console.log('click')
        window.location.href = `/user/${user_account_id}`;
    });
})