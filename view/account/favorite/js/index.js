

$(function () {
    let page_index = 0;
    let fav_data = null;
    $(document).ready(function () {

        get_favorite(user_account_id);
        $("#prev_btn").prop('disabled', true);
    });

    $("#next_btn").click(function () {
        console.log(fav_data.length - 1)
        if (fav_data.length > page_index + 5) {
            page_index += 5;
            set_favorite(fav_data, page_index);
            $("#prev_btn").prop('disabled', false);
            if(fav_data.length -  page_index < 5){
                $(this).prop('disabled', true);
            }
        }

    });
    $("#prev_btn").click(function () {
        if (page_index > 4) {
            page_index -= 5;
            set_favorite(fav_data, page_index);
            $("#next_btn").prop('disabled', false);
            if(page_index < 4){
                $(this).prop('disabled', true);
            }
        }

    });

    function del_favorite(id) {
        console.log(id)
        var select = confirm("削除しますか？");
        console.log(select)
        if (select) {
            $.get("https://app.eatingmap.fun/api/user_favorite.php", { code: "del", user: user_account_id, shop: id });
            get_favorite(user_account_id);
        }
        return select;
    }

    function get_favorite(id) {
        page_index = 0;
        $.get("https://app.eatingmap.fun/api/get_favorite.php", { user: id }).done(function (data) {

            if (data.code == "1") {
                fav_data = data.data;
                console.log(fav_data)
                set_favorite(fav_data, 0);
                if(fav_data.length < 6){
                    $("#next_btn").prop('disabled', true);
                    $("#prev_btn").prop('disabled', true);
                }
            }
        })
    }

    function set_favorite(data, index) {
        $("#fav_list").html("");
        for (let i = index; i < index + 5; i++) {
            if (i > data.length - 1) break;
            let shop = data[i];
            $("#fav_list").append(`<div id=${shop.id} class="shop_data">`);
            //templateをloadし各種データを埋め込む
            $(`#${shop.id}`).load("/view/account/favorite/main/template.html", function (myData, myStatus) {
                $(`#${shop.id}`).find("#shopname").html(shop.name);
                $(`#${shop.id}`).find("#date").html(shop.create_time);
            });
            $(`#${shop.id}`).on("click", "#del_btn", function () {
                del_favorite(shop.id);
            });
            //buttonにshopページへのリンクイベントを付与
            $(`#${shop.id}`).on("click", "#click_area", function () {
                location.href = `/shop/${shop.id}`;
            });
        }
    }

});