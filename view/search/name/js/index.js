
$(function () {
    let name = "";
    let shop_data;
    let page_index = 0;

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
        page_index = params.get('code') * 5;

        $(".title").next(".box").slideToggle();

        //詳細選択画面に埋め込み
        $("#search_name").val(name);
        setTimeout(() => {
            $('#select-pref').val(pref);
            change_pref();
            $('#select-city').val(city);
            $('#price').val(price);
            get_shop(name, page_index);
        }, 100);
    });

    //onメソッドを使ったkeyupイベント処理
    $("#search_name").keypress(function (e) {
        if (e.keyCode == 13) {
            name = $("#search_name").val();
            get_shop(name);
        }
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

    $("#next_btn").click(async function () {
        if (shop_data.length > page_index + 5) {
            page_index += 5;

            set_shop(shop_data);
            $("#prev_btn").prop('disabled', false);
            if (shop_data.length - page_index < 6) {
                $(this).prop('disabled', true);
            }
        }

    });
    $("#prev_btn").click(async function () {
        if (page_index > 4) {
            page_index -= 5;
            set_shop(shop_data);
            $("#next_btn").prop('disabled', false);
            if (page_index < 4) {
                $(this).prop('disabled', true);
            }
        }
    });


    async function set_shop(shop_data) {
        screenLock();
        let count = 0;
        $('#shop_list').attr('id', 'shop_list_prev');
        $('#shop_list_prev').after('<div id="shop_list" style="display:none;"></div>');
        if (page_index > shop_data.length) {
            page_index = Math.floor(shop_data.length / 5) * 5;
        }
        for (let i = page_index; i < shop_data.length; i++) {
            let shop = shop_data[i];
            $("#shop_list").append(`<div id=${shop.id} class="shop_data">`);
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
            //buttonにshopページへのリンクイベントを付与
            $(`#shop_list #${shop.id}`).on("click", ".shopbtn", function () {
                window.location.href = `/shop/${shop.id}`;
            });
            if (count == 4) {
                break;
            }
            count++;
        }
        if (count < 4) {
            $("#next_btn").prop('disabled', true);
        }
        $('#shop_list').show();
        $('#shop_list_prev').remove();
        delete_dom_obj();
    }

    function get_shop(name, page = 0) {
        change_url();
        page_index = page;
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
        $.get("https://app.eatingmap.fun/api/shop/search/index.php", json
        ).done(async function (data) {
            shop_data = data;
            if (shop_data.length < 6) {
                $("#next_btn").prop('disabled', true);
            } else {
                $("#next_btn").prop('disabled', false);
            }
            if (page_index > 4) {
                $("#prev_btn").prop('disabled', false);
            }
            await set_shop(shop_data);
            $("#search_count").html(shop_data.length);

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
        let code = Math.floor(page_index / 5);
        const keys = ["name", "pref", "city", "price"]
        let params = [name, pref, city, price];
        let url = `/search/name?code=${code}`;
        for (var i in keys) {
            if (params[i] != "") {
                url += `&${keys[i]}=${params[i]}`;
            }
        }
        history.replaceState('', '', url);
    }
});

