$(function () {
    let page_index = 0;
    $("#next_btn").click(async function () {
        console.log(page_index)
        page_index += 1;
        let res = await get_review(user_account_id, page_index);

        $("#prev_btn").prop("disabled", false);
        $(this).prop("disabled", !res);
    });
    $("#prev_btn").click(async function () {
        console.log(page_index)
        if(page_index > 0){
            $(this).prop("disabled", page_index == 0);
            $("#next_btn").prop("disabled", false);
            page_index -= 1;
            get_review(user_account_id, page_index);
        }
        if(page_index == 0){
            $(this).prop("disabled", true);
        }
    });

    $(document).ready(function () {
        get_review(user_account_id, page_index);
        $("#prev_btn").prop("disabled", true);
    });

    async function get_review(user, index) {
        let result = false;
        $.ajax({
            type: 'get',
            url: `https://app.eatingmap.fun/api/review/index.php?id=${user}&index=${index}`,
            async: false,
        }).done(async function (data) {
            if (data.code) {
                $("#review_list").html("");
                if(data.data.length == 5){
                    result = true;
                }
                for (review of data.data) {
                    if (review.shop_id != "") {
                        set_review(review);
                        $(".main_area").show();
                    }else{
                        $(".main_area").hide();
                    }
                }
            } else {
                $('#user_name').html("guest");
            }

        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
        return result;
    }

    async function get_shop(shop) {
        let result = "";
        $.ajax({
            type: 'get',
            url: `https://app.eatingmap.fun/api/shop/index.php?id=${shop}`,
            async: false
        }).done(function (data) {
            if (data.code) {
                result = data.data.name;
            }
        });
        return result;
    }

    function set_review(review) {
        $("#review_list").append(`<div id=${review.id}>`);
        //templateをloadし各種データを埋め込む
        $(`#${review.id}`).load("/view/account/review/main/template.html", async function (myData, myStatus) {
            $(`#${review.id}`).find("#score").html(review.score);
            $(`#${review.id}`).find("#review").html(review.text.substr(0, 50));
            $(`#${review.id}`).find("#create").html(review.create_time);
            $(`#${review.id}`).find("#update").html(review.update_time);
            $(`#${review.id}`).find("#name").html(await get_shop(review.shop_id));
        });
        //buttonにshopページへのリンクイベントを付与
        $(`#${review.id}`).on("click", ".change_btn", function () {
            window.location.href = `/view/shop/edit_review/index.php?id=${review.shop_id}`;
        });
        $(`#${review.id}`).on("click", ".delete_btn", function () {
            window.location.href = `/view/account/review/index.php?id=${review.shop_id}`;
        });
    }

});