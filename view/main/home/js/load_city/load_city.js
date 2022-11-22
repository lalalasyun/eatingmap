$(window).on('load', function() {
    // 都道府県フォーム生成
    $(function() {
        $.getJSON('js/load_city/pref_city.json', function(data) {
            for (var i = 1; i < 48; i++) {
                var code = ('00' + i).slice(-2); // ゼロパディング
                $('#select-pref').append($('<option>').html('' + data[i - 1][code].pref + '').val(code));
            }
        });
    });


    // 都道府県メニューに連動した市区町村フォーム生成
    $('#select-pref').on('change', function() {

        $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
        var select_pref = ($('#select-pref option:selected').val());
        console.log(select_pref)
        var key = Number(select_pref) - 1;
        $.getJSON('js/load_city/pref_city.json', function(data) {
            for (var i = 0; i < data[key][select_pref].city.length; i++) {
                $('#select-city').append($('<option>').html('' + data[key][select_pref].city[i].name + '').val(i));
            }
        });
    });
});