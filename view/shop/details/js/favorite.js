$(function () {
    $("#add_fav").click(function () {
        if(!user_account_id){
            window.location.href = '/view/authority/login/';
            return;
        }
        $.get(`${data_list.apiUrl}/api/user_favorite.php`, { code: "add", user: user_account_id,shop:shop_id } );
        $(this).hide();
        $("#del_fav").show();
    });

    $("#del_fav").click(function () {
        if(!user_account_id){
            window.location.href = '/view/authority/login/';
            return;
        }
        $.get(`${data_list.apiUrl}/api/user_favorite.php`, { code: "del", user: user_account_id,shop:shop_id } );
        $(this).hide();
        $("#add_fav").show();
    });

});