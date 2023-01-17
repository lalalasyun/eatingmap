$(function () {
    let name = "";
    let shop_data;
    let shop_index = 0;
    let shop_length = 0;
    const PAGE = 5;

    $(document).ready(function () {
        // URLを取得
        let url = new URL(window.location.href);

        // URLSearchParamsオブジェクトを取得
        let params = url.searchParams;

        // getメソッド
        name = params.get('name');
        let pref = params.get('pref');
        let city = params.get('city');
        let price = params.get('price');
        if (params.get('p') > 0) {
            shop_index = (params.get('p') - 1) * PAGE;
        }

        //詳細選択画面に埋め込み
        $("#search_name").val(name);

        if(name.length > 0){
            $('.input-xmark').show();
        }
        
        $(".title").next(".box").toggle(function(){
            $('#select-pref').val(pref);
            change_pref();
            $('#select-city').val(city);
            $('#price').val(price);
            get_shop(name);
        });
        
    });

    //onメソッドを使ったkeyupイベント処理
    $("#search_name").keypress(function (e) {
        if (e.keyCode == 13) {
            name = $("#search_name").val();
            get_shop(name);
        }
    });

    $('#search_name').on('input', function(){
        //文字数を取得
        var cnt = $(this).val().length;
        if(cnt > 0 && 25 > cnt){
            $('.input-xmark').show();
        }else{
            let keyword = $(this).val();
            $(this).val(keyword.slice(0,-1));
            $('.input-xmark').hide();
        }
    });

    $('.input-xmark').click(function (e) {
        $('#search_name').val('');
        $('.input-xmark').hide();
    });

    //細部選択ボタンイベント処理
    $("#search_btn,.title").click(async function () {
        if ($(".box").css('display') == 'block') {
            name = $("#search_name").val();
            get_shop(name);
        }
    });

    $('#select-pref,#select-city,#price').change(function () {
        get_shop(name);
    });


    async function set_shop(shop_data) {
        let page_index = Math.floor(shop_index / PAGE) + 1;
        let page_length = Math.floor((shop_length - 1) / PAGE) + 1;
        $("#search_count").html(shop_length);
        $("#search_page").html(`(${shop_index}〜${shop_index + PAGE}件)`);
        set_page_btn(page_index, page_length);
        set_page_click();
        change_url();
        screenLock();
        let count = 0;
        $('#shop_list').attr('id', 'shop_list_prev');
        $('#shop_list_prev').after('<div id="shop_list" style="display:none;"></div>');
        if (shop_index > shop_length) {
            shop_index = Math.floor(shop_length / PAGE) * PAGE;
        }
        for (let i = shop_index; i < shop_length; i++) {
            let shop = shop_data[i];
            $("#shop_list").append($(`<div/ class="shop_data">`).append(`<a/ id=${shop.id}  href="/shop/${shop.id}">`));

            //templateをloadし各種データを埋め込む
            await sampleResolve();
            function sampleResolve() {
                return new Promise(resolve => {
                    $(`#shop_list #${shop.id}`).load("/view/search/name/main/template.html", async function (myData, myStatus) {
                        $(`#shop_list #${shop.id}`).find(".shopname").html(shop.name);
                        $(`#shop_list #${shop.id}`).find(".shopscore").html(shop.score);
                        $(`#shop_list #${shop.id}`).find(".shopimage").attr('src', `/images/shopImage/${shop.image}`);
                        set_star(shop.id, shop.score);
                        resolve(true);
                    });
                })
            }
            if (count == PAGE - 1) {
                break;
            }
            count++;
        }
        $('#shop_list').fadeIn(200);
        $('#shop_list_prev').fadeOut(100).remove();
        delete_dom_obj();
    }

    function get_shop(name) {
        let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
        let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
        let price = $("#price").val();
        let json = {
            name: name
        }
        if (pref !== "都道府県") {
            json['pref'] = pref;
        }

        if (city !== "市区町村") {
            json['city'] = city;
        }

        if (price !== "") {
            json['price'] = price;
        }


        shop_data = null;
        $.get(`${data_list.apiUrl}/api/shop/search/index.php`, json
        ).done(async function (data) {
            if (!data) {
                shop_data = [];
                shop_length = 0;
                return;
            }
            shop_data = data;
            shop_length = shop_data.length

            if (shop_index > shop_length) {
                let index = shop_length - PAGE;
                shop_index = index > -1 ? index : 0;
            }

            await set_shop(shop_data);
        });

    }

    function set_star(id, score) {
        for (let i = 1; i < 6; i++) {
            if (i == score) {
                $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star active" data-name="${i}">`);
            } else if (i < score) {
                $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star " data-name="${i}">`);
            } else {
                $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star-o" data-name="${i}">`);
            }
        }
    }
    function change_url() {
        let name = $("#search_name").val();
        let pref = $("#select-pref").val();
        let city = $("#select-city").val();
        let price = $("#price").val();
        let code = Math.floor(shop_index / PAGE) + 1;
        const keys = ["name", "pref", "city", "price"]
        let params = [name, pref, city, price];
        let url = `/search/name?p=${code}`;
        for (var i in keys) {
            if (params[i] != "") {
                url += `&${keys[i]}=${params[i]}`;
            }
        }
        history.pushState('', '', url);
    }

    function set_page_click() {
        /* page_button */
        $(".style_pages li").click(function () {
            let index = $(this).find('a').data('index');
            if(index == null) return;
            if (index == 'prev') {
                if (shop_index >= PAGE) {
                    shop_index -= PAGE;
                    set_shop(shop_data);
                }
                return
            }
            if (index == 'next') {
                if (shop_length > shop_index + PAGE) {
                    shop_index += PAGE;
                    set_shop(shop_data);
                }
                return
            }
            if (index == 'last') {
                shop_index = Math.floor((shop_length - 1) / PAGE) * PAGE;
                set_shop(shop_data);
                return
            }
            if (shop_index != index * PAGE) {
                shop_index = index * PAGE;
                set_shop(shop_data);
            }

        })
    }
});

