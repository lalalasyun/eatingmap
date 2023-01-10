//headタグのdata属性を取得辞書に追加
let data_list = {};
$('head').find('script').each(function () {
    for (let [key, value] of Object.entries($(this).data())) {
        data_list[key] = value;
    }
});