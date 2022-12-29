$(function () {
    $("#search_btn").click(function () {
        let name = $("#search_name").val();
        let pref = $("#select-pref").val();
        let city = $("#select-city").val();
        let price = $("#price").val();
        let keys = ["name", "pref", "city", "price"]
        let params = [name, pref, city, price];
        let url = "/view/search/name?code=0";
        for (var i in keys) {
            if (params[i] != "") {
                url += `&${keys[i]}=${params[i]}`;
            }
        }

        window.location.href = url;
    });

    $(document).ready(async function () {
        if (localStorage.getItem('recently')) {
            const NOW_TIME = Date.now();
            let json = JSON.parse(localStorage.getItem('recently'));

            for (let key in json) {
                //86400000 * 7 1週間
                //追加日から1週間が経過したデータだけ削除する
                let diff = NOW_TIME - json[key].date;
                if(diff > 86400000 * 7){
                    delete json[key];
                    continue;
                }

                $("#recently_shop").append(`<div id="${key}"class="shop_div" title="${json[key].name}">`);
                $(`#${key}`).append(`<img class="mx-2" src="/images/shopImage/${json[key].image}" width="80px" height="80px" loading="lazy" alt="recently">`)
                $(`#${key}`).append(`<div class="recent_shop_name">${json[key].name}`)
                $(`#${key} img`).click(function () {
                    window.location.href = `/shop/${key}`;
                });
                $(`#${key} img`).css('cursor', 'pointer');
            }

        }
    });
})