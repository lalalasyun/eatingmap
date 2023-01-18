$(function () {
    let fav_index = 0;
    let fav_length = 0;

    let fav_data = null;

    //1ページ当たりの表示数
    const PAGE = 5;

    $(document).ready(function () {
        // URLを取得
        let url = new URL(window.location.href);
        // URLSearchParamsオブジェクトを取得
        let params = url.searchParams;
        if (params.get('p') > 0) {
            fav_index = (params.get('p') - 1) * PAGE;
        }
        get_favorite(user_account_id);
    });


    async function del_favorite(id) {
        var select = confirm("削除しますか？");
        if (select) {
            screenLock();
            await $.get(`${data_list.apiUrl}/api/user_favorite.php`, { code: "del", user: user_account_id, shop: id });
            delete_dom_obj();
        }
        return select;
    }

    async function get_favorite(id) {
        screenLock();
        page_index = 0;
        await $.get(`${data_list.apiUrl}/api/get_favorite.php`, { user: id }
        ).done(async function (data) {
            console.log(data)
            if (!data || !data.code) {
                fav_data = [];
                fav_length = 0;
                return;
            }
            if (data.data.length) {
                fav_data = data.data;
                fav_length = fav_data.length;

                if (fav_index > fav_length) {
                    let index = fav_length - PAGE;
                    fav_index = index > -1 ? index : 0;
                }
                set_favorite(fav_data);
            }else{
                $("#fav_list").load('/view/account/favorite/main/template1.html')
            }
        })
        delete_dom_obj();
        

    }

    async function set_favorite(data) {
        let page_index = Math.floor(fav_index / PAGE) + 1;
        let page_length = Math.floor((fav_length - 1) / PAGE) + 1;
        set_page_btn(page_index, page_length);
        set_page_click();
        change_url();
        screenLock();
        $('#fav_list').attr('id', 'fav_list_prev');
        $('#fav_list_prev').after('<div id="fav_list" style="display:none;"></div>');
        for (let i = fav_index; i < fav_index + 5; i++) {
            if (i > data.length - 1) break;
            let shop = data[i];
            $("#fav_list").append(`<div id=${shop.id} class="shop_data">`);
            //templateをloadし各種データを埋め込む
            date = new Date(shop.create_time);
            function formatDate (date, format) {
                format = format.replace(/yyyy/g, date.getFullYear());
                format = format.replace(/M/g, (date.getMonth() + 1));
                format = format.replace(/d/g, (date.getDate()));
                return format;
              };
              
            await sampleResolve();
            function sampleResolve() {
                return new Promise(resolve => {
                    $(`#${shop.id}`).load("/view/account/favorite/main/template.html", function (myData, myStatus) {
                        $(`#${shop.id}`).find("#shopname").html(shop.name);
                        $(`#${shop.id}`).find("#date").html(formatDate(date, '追加日:yyyy年M月d日'));
                        resolve(true);
                    });

                })
            }
            $(`#${shop.id}`).on("click", "#del_btn", async function () {
                await del_favorite(shop.id);
                location.reload();
            });
            //buttonにshopページへのリンクイベントを付与
            $(`#${shop.id}`).on("click", "#click_area", function () {
                location.href = `/shop/${shop.id}`;
            });


        }
        $('#fav_list').show();
        $('#fav_list_prev').remove();
        delete_dom_obj();
    }

    function change_url() {
        let code = Math.floor(fav_index / PAGE) + 1;
        let url = `/favorite?p=${code}`;
        history.pushState('', '', url);
    }

    function set_page_click() {
        /* page_button */
        $(".style_pages li").click(function () {
            let index = $(this).find('a').data('index');
            if (index == null) return;
            if (index == 'prev') {
                if (fav_index >= PAGE) {
                    fav_index -= PAGE;
                    set_favorite(fav_data);
                }
                return
            }
            if (index == 'next') {
                if (fav_length > fav_index + PAGE) {
                    fav_index += PAGE;
                    set_favorite(fav_data);
                }
                return
            }
            if (index == 'last') {
                fav_index = Math.floor((fav_length - 1) / PAGE) * PAGE;
                set_favorite(fav_data);
                return
            }
            if (fav_index != index * PAGE) {
                fav_index = index * PAGE;
                set_favorite(fav_data);
            }

        })
    }

});