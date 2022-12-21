$(function () {
    let page_index = 0;
    let page_length = 0;
   

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
                page_length = Math.floor(data.count/5);
                set_page_btn(page_index+1, page_length);
                $("#review_list").html("");
                if (data.data.length == 5) {
                    result = true;
                }
                for (review of data.data) {
                    if (review.shop_id != "") {
                        set_review(review);
                        $(".main_area").show();
                    } else {
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
        set_page_btn(page_index+1, page_length+1);
        set_page_click();
        
        console.log(page_index+1, page_length+1)
        $("#review_list").append(`<div id=${review.id}>`);
        //templateをloadし各種データを埋め込む
        $(`#${review.id}`).load("/view/account/review/main/template.html", async function (myData, myStatus) {
            set_star(review.id,review.score);
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

    function set_star(id,score) {
        for (let i = 1; i < 6; i++) {
            if (i == score) {
                $(`#${id}`).find("#rating").append(`<span class="fa fa-star active" data-name="${i}">`);
            } else if (i < score) {
                $(`#${id}`).find("#rating").append(`<span class="fa fa-star " data-name="${i}">`);
            } else {
                $(`#${id}`).find("#rating").append(`<span class="fa fa-star-o" data-name="${i}">`);
            }
        }
    }

    function set_page_click() {
        const PAGE = 1;
        /* page_button */
        $(".style_pages li").click(function () {
          let index = $(this).find('a').data('index');
          if (index == 'prev') {
            if (page_index >= PAGE) {
              page_index -= PAGE;
              get_review(user_account_id, page_index);
            }
            return
          }
          if (index == 'next') {
            if (page_length > page_index + PAGE) {
              page_index += PAGE;
              get_review(user_account_id, page_index);
            }
            return
          }
          if (index == 'last') {
            page_index = Math.floor((page_length - 1) / PAGE) * PAGE;
            get_review(user_account_id, page_index);
            return
          }
          if (page_index != index * PAGE) {
            page_index = index * PAGE;
            get_review(user_account_id, page_index);
          }
    
        })
      }

});