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
        if (sessionStorage.getItem('recently')) {
            json = JSON.parse(sessionStorage.getItem('recently'));

            for (let id in json) {
                $("#recently_shop").append(`<div id="${id}"class="shop_div">`);
                $(`#${id}`).append(`<img class="mx-2" src="/images/shopImage/${json[id].image}" width="80px" height="80px">`)
                $(`#${id}`).append(`<div>${json[id].name}`)
                $(`#${id}`).click(function () {
                    window.location.href = `/shop/${id}`;
                });
                $(`#${id}`).css('cursor', 'pointer');
            }

        }
    });
})