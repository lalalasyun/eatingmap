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
            name =  window.sessionStorage.getItem(['name']);
            pref =  window.sessionStorage.getItem(['pref']);
            city =  window.sessionStorage.getItem(['city']);
            price =  window.sessionStorage.getItem(['price']);
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
    $(document).on("keyup", "#search_name", function (e) {
        name = $("#search_name").val();
        get_shop(name);
    });

    $("#search_btn,.title").click(async function () {
        name = $("#search_name").val();
        page_index = 0
        get_shop(name);
    });

    $('#select-pref,#select-city,#price').change(function () {
        name = $("#search_name").val();
        page_index = 0
        get_shop(name);
    });

    $("#next_btn").click(async function () {
        let isSet = false;
        page_index += 5;

        $("#shop_list").html("");
        if (page_index > -1 && page_index < shop_data.length - 5) {
            $("#next_btn").show();
        } else {
            $("#next_btn").hide();
        }
        if (page_index > 4) {
            $("#prev_btn").show();
        } else {
            $("#prev_btn").hide();
        }

        for (let i = page_index; i < page_index + 5; i++) {
            if (shop_data.length <= i || i < 0) break;
            let shop = shop_data[i];
            let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
            let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
            let price = $("#price").val();
            let location = shop.location1;
            if (check_area(location, pref, city) && check_price(shop.price, price)) {
                set_shop(shop);
                isSet = true;
            }
        }
        if (!isSet) {
            page_index -= 5;
        }
    });
    $("#prev_btn").click(async function () {
        let isSet = false;
        page_index -= 5;

        $("#shop_list").html("");
        if (page_index > -1 && page_index < shop_data.length - 5) {
            $("#next_btn").show();
        } else {
            $("#next_btn").hide();
        }
        if (page_index > 4) {
            $("#prev_btn").show();
        } else {
            $("#prev_btn").hide();
        }

        for (let i = page_index; i < page_index + 5; i++) {
            if (shop_data.length <= i || i < 0) break;
            let shop = shop_data[i];
            let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
            let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
            let price = $("#price").val();
            let location = shop.location1;
            if (check_area(location, pref, city) && check_price(shop.price, price)) {
                set_shop(shop);
                isSet = true;
            }
        }
        if (!isSet) {
            page_index += 5;
        }
    });


    function set_shop(shop) {
        $("#shop_list").append(`<div id=${shop.id} class="shop_data">`);
        //templateをloadし各種データを埋め込む
        $(`#${shop.id}`).load("/view/search/name/main/template.html", function (myData, myStatus) {
            $(`#${shop.id}`).find(".shopname").html(shop.name);
            $(`#${shop.id}`).find(".shopscore").html(shop.score);
            $(`#${shop.id}`).find(".shopimage").attr('src', `/images/shopImage/${shop.image}`);
        });
        //buttonにshopページへのリンクイベントを付与
        $(`#${shop.id}`).on("click", ".shopbtn", function () {
            window.location.href = `/shop/${shop.id}`;
        });
    }

    function check_area(location, pref, city) {
        var result = location.replace(/\s+/g, "").match(/^(.+?)(?:県|都)(.+?)(?:市|区|町)(.+?)$/);
        if (pref === "都道府県") return true;
        if (result == null) return false;
        if (pref.indexOf(result[1]) == -1) return false;
        if (city !== "市区町村") {
            if (city.indexOf(result[2]) == -1) return false;
        }
        return true;
    }

    function check_price(shop_price, price) {
        if (shop_price == null || price == "") {
            return true;
        }
        return shop_price <= price;
    }

    async function get_shop(name) {
        await $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async: true,
            type: 'GET',
            url: `https://app.eatingmap.fun/shop/page?page=1&pageSize=50&name=${name}`
        }).done(function (data) {
            shop_data = data.data.records;
            $("#shop_list").html("");
            if (page_index > -1 && page_index < shop_data.length - 5) {
                $("#next_btn").show();
            } else {
                $("#next_btn").hide();
            }
            if (page_index > 4) {
                $("#prev_btn").show();
            } else {
                $("#prev_btn").hide();
            }

            for (let i = page_index; i < page_index + 5; i++) {
                if (shop_data.length <= i || i < 0) break;
                let shop = shop_data[i];
                let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
                let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
                let price = $("#price").val();
                let location = shop.location1;
                if (check_area(location, pref, city) && check_price(shop.price, price)) {
                    set_shop(shop);
                }
            }
        })
            // Ajaxリクエストが失敗した場合
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href = '/view/error/500';
            });
    }
});