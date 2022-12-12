$(window).on('load', function () {
    // 都道府県フォーム生成
    $(function () {
        for (var i = 1; i < 48; i++) {
            var code = ('00' + i).slice(-2); // ゼロパディング
            $('#select-pref').append($('<option>').html('' + city[i - 1][code].pref + '').val(code));
        }
    });


    // 都道府県メニューに連動した市区町村フォーム生成
    $('#select-pref').on('change', function () {
        change_pref();
    });
});

function change_pref() {
    $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
    var select_pref = ($('#select-pref option:selected').val());
    var key = Number(select_pref) - 1;
    if (city[key] == null) return;
    for (var i = 0; i < city[key][select_pref].city.length; i++) {
        $('#select-city').append($('<option>').html('' + city[key][select_pref].city[i].name + '').val(i));
    }
}