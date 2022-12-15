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

        if (name != null) {
            // session 格納
            window.sessionStorage.setItem(['name'], [name]);
            window.sessionStorage.setItem(['pref'], [pref]);
            window.sessionStorage.setItem(['city'], [city]);
            window.sessionStorage.setItem(['price'], [price]);
            window.location.href = `/view/search/name`;
        } else {
            name = window.sessionStorage.getItem(['name']);
            pref = window.sessionStorage.getItem(['pref']);
            city = window.sessionStorage.getItem(['city']);
            price = window.sessionStorage.getItem(['price']);
        }

        $(".title").next(".box").slideToggle();

        //詳細選択画面に埋め込み
        $("#search_name").val(name);
        setTimeout(() => {
            $('#select-pref').val(pref);
            change_pref();
            $('#select-city').val(city);
            $('#price').val(price);
            get_shop(name);
        }, 100);
    });

    //onメソッドを使ったkeyupイベント処理
    $("#search_name").keypress(function (e) {
        if (e.keyCode == 13) {
            page_index = 0;
            name = $("#search_name").val();
            get_shop(name);
        }
    });

    //細部選択ボタンイベント処理
    $("#search_btn,.title").click(async function () {
        if ($(".box").css('display') == 'block') {
            page_index = 0
            name = $("#search_name").val();
            get_shop(name);
        }
    });

    $('#select-pref,#select-city,#price').change(function () {
        page_index = 0
        get_shop(name);
    });

    $("#next_btn").click(async function () {
        if (shop_data.length > page_index + 5) {
            page_index += 5;

            set_shop(shop_data);
            $("#prev_btn").prop('disabled', false);
            console.log(shop_data.length - page_index)
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
        const start = Date.now();
        let count = 0;
        $('#shop_list').attr('id', 'shop_list_prev');
        $('#shop_list_prev').after('<div id="shop_list" style="display:none;"></div>');
        for (let i = page_index; i < shop_data.length; i++) {
            let shop = shop_data[i];
            $("#shop_list").append(`<div id=${shop.id} class="shop_data">`);
            //templateをloadし各種データを埋め込む
            await $(`#${shop.id}`).load("/view/search/genre/main/template.html", async function (myData, myStatus) {
                $(`#${shop.id}`).find(".shopname").html(shop.name);
                $(`#${shop.id}`).find(".shopscore").html(shop.score);
                $(`#${shop.id}`).find(".shopimage").attr('src', `/images/shopImage/${shop.image}`);
            });
            //buttonにshopページへのリンクイベントを付与
            $(`#${shop.id}`).on("click", ".shopbtn", function () {
                window.location.href = `/shop/${shop.id}`;
            });
            if (count == 4) {
                break;
            }
            count++;
        }
        $('#shop_list').show();
        $('#shop_list_prev').remove();
        console.log(Date.now() - start)
    }

    function get_shop(name) {
        screenLock();
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

        $.get("https://app.eatingmap.fun/api/shop/search/index.php", json
        ).done(async function (data) {
            shop_data = data;
            await set_shop(shop_data);

            if (shop_data.length < 6) {
                $("#next_btn").prop('disabled', true);
                $("#prev_btn").prop('disabled', true);
            } else {
                $("#next_btn").prop('disabled', false);
            }
            delete_dom_obj();
        });

    }
});