$(function () {
    $('#search_btn').hover(
        function (){
            set_url();
        }
    );

    $(".main").keypress(function (e) {
        if (e.keyCode == 13) {
            let url = set_url();
            window.location.href=url;
        }
    });

    function set_url() {
        let name = $("#search_name").val();
        let pref = $("#select-pref").val();
        let city = $("#select-city").val();
        let price = $("#price").val();
        let keys = ["name", "pref", "city", "price"]
        let params = [name, pref, city, price];
        let url = "/view/search/name?p=1";
        for (var i in keys) {
            if (params[i] != "") {
                url += `&${keys[i]}=${params[i]}`;
            }
        }
        $('#search_btn').attr("href", url);
        return url;
    }

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


    $(document).ready(async function () {
        if (localStorage.getItem('recently')) {
            const NOW_TIME = Date.now();
            let json = JSON.parse(localStorage.getItem('recently'));

            for (let key in json) {
                //86400000 * 7 1週間
                //追加日から1週間が経過したデータだけ削除する
                let diff = NOW_TIME - json[key].date;
                if (diff > 86400000 * 7) {
                    delete json[key];
                    continue;
                }

                $("#recently_shop").append(`<div id="${key}"class="shop_div" title="${json[key].name}">`);
                $(`#${key}`)
                    .append($(`<a/ href=/shop/${key}>`)
                    .append(`<img class="mx-2 rounded-2" src="/images/shopImage/${json[key].image}" width="80px" height="80px" loading="lazy" alt="recently" >`));
                $(`#${key}`).append(`<div class="recent_shop_name">${json[key].name}`);
            }

        }
    });
})