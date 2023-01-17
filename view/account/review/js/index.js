$(function () {
    let page_index = 0;
    let page_length = 0;
    let review_index = 0;
    let review_length = 0;
    let review_data;
    const PAGE = 5;


    $(document).ready(function () {
        // URLを取得
        let url = new URL(window.location.href);
        // URLSearchParamsオブジェクトを取得
        let params = url.searchParams;
        if (params.get('p') > 0) {
            review_index = (params.get('p') - 1) * PAGE;
        }
        get_review(user_account_id);
    });

    async function get_review(user) {
        let result = false;
        $.ajax({
            type: 'get',
            url: `${data_list.apiUrl}/api/review/index.php?id=${user}`,
            async: false,
        }).done(async function (data) {
            if (data.code) {
                review_data = data.data;
                review_length = data.count;
                page_length = Math.floor(data.count / PAGE);
                $("#review_list").html("");
                if (review_length == PAGE) {
                    result = true;
                }
                set_review();
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


    async function set_review() {
        page_index = Math.floor(review_index / PAGE) + 1;
        page_length = Math.floor((review_length - 1) / PAGE) + 1;
        change_url();
        set_page_btn(page_index, page_length);
        set_page_click();
        screenLock();
        let count = 1;
        $('#review_list').attr('id', 'review_list_prev');
        $('#review_list_prev').after('<div id="review_list" style="display:none;"></div>');
        for (let i = review_index; i < review_length; i++) {
            let review = review_data[i];
            $("#review_list").append(`<div id=${review.id}>`);
            //templateをloadし各種データを埋め込む
            await sampleResolve();
            function sampleResolve() {
                return new Promise(resolve => {
                    $(`#${review.id}`).load("/view/account/review/main/template.html", async function (myData, myStatus) {
                        set_star(review.id, review.score);
                        $(`#${review.id}`).find("#review").html(review.text.substr(0, 50));
                        $(`#${review.id}`).find("#create").html(review.create_time);
                        $(`#${review.id}`).find("#update").html(review.update_time);
                        $(`#${review.id}`).find("#name").html(review.name);
                        resolve(true);
                    });
                })
            }
            //buttonにshopページへのリンクイベントを付与
            $(`#${review.id}`).on("click", ".shop_data", function () {
                window.location.href = `/shop/${review.shop_id}`;
            });
            $(`#${review.id}`).on("click", ".change_btn", function () {
                window.location.href = `/view/shop/edit_review/index.php?id=${review.shop_id}`;
            });
            $(`#${review.id}`).on("click", ".delete_btn", function () {
                var select = confirm("削除しますか？");
                if (select) {
                    window.location.href = `/view/account/review/index.php?id=${review.shop_id}`;
                }
            });
            if (count == PAGE) {
                break;
            }
            count++;
        }
        $('#review_list').show();
        $('#review_list_prev').remove();
        delete_dom_obj();
    }

    function set_star(id, score) {
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

    function change_url() {
        let code = page_index;
        let url = `/setting/review?p=${code}`;
        history.pushState('', '', url);
    }

    function set_page_click() {
        /* page_button */
        $(".style_pages li").click(function () {
            let index = $(this).find('a').data('index');
            if (index == null) return;
            if (index == 'prev') {
                if (review_index >= PAGE) {
                    review_index -= PAGE;
                    set_review(user_account_id);
                }
                return
            }
            if (index == 'next') {
                if (review_length > review_index + PAGE) {
                    review_index += PAGE;
                    set_review(user_account_id);
                }
                return
            }
            if (index == 'last') {
                review_index = Math.floor((review_length - 1) / PAGE) * PAGE;
                set_review(user_account_id);
                return
            }
            if (review_index != index * PAGE) {
                review_index = index * PAGE;
                set_review(user_account_id);
            }

        })
    }

});