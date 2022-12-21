const TAG_DATA = [
    { "name": "支払方法", "value": ["カード可", "カード不可", "電子マネー不可", "電子マネー可", "QRコード決済不可", "QRコード決済可"] },
    { "name": "予約可否", "value": ["予約可", "予約不可"] },
    { "name": "ペット可否", "value": ["ペット可", "ペット不可"] },
    { "name": "禁煙・喫煙", "value": ["全席禁煙", "全席喫煙", "一部喫煙"] },
    { "name": "駐車場", "value": ["無", "有"] },
    { "name": "貸切", "value": ["有", "無"] }
];

$(function () {
    $(document).ready(async function () {
        for (let tag of HAS_TAG) {
            let id = await set_tag_form();
            await new Promise(s => setTimeout(s, 100));
            $(`#${id} #tag_select`).val(tag.name);
            $(`#${id} #tag_select`).trigger('change');
            let tag_val = JSON.parse(tag.value)
            for (let val of tag_val) {
                $(`#${id}`).find("#div_select").append(`<a class="notShown shown" style=""><em>${val}</em><i></i></a>`)
            }
        }

    });
    $("#tag_select").change(function () {
        let ary = $("#tag_select option:selected").data('value');
        console.log(ary);
    });
    $(`#add_btn`).click(function () {
        set_tag_form();
    });

    $('#submit').on('click', function() {
        if (!$('#input_area').validate().form()) {
            return;
        } 
        let name = $("#name").val();
        let location = $("#location").val();
        let description = $("#description").val();
        let phone = $("#phone").val();
        let station = $("#station").val();
        let price = $("#price").val();
        let genre = $("#genre").val();
        let type = $("#type").val();

        let tags = get_val();

        let json = {
            id: shop_id,
            name: name,
            location: location,
            description: description,
            phone: phone,
            station: station,
            price: price,
            genre: genre,
            type: type
        }

        $.ajax({
            type: "post",                // method = "POST"
            url: "https://app.eatingmap.fun/api/shop/edit/index.php",        // POST送信先のURL
            data: JSON.stringify(json),  // JSONデータ本体
            contentType: 'application/json', // リクエストの Content-Type
            dataType: "json"           // レスポンスをJSONとしてパースする
        });
    })
});
async function set_tag_form() {
    const id = $('.tag-form > div').length;
    $('.tag-form').append(`<div id="${id}" class="d-flex">`);
    await $(`#${id}`).load('/view/shop/edit_data/main/template.html', function (myData, myStatus) {
        for (let tag of TAG_DATA) {
            $(`#${id} #tag_select`).append(`<option value="${tag.name}" data-value='${tag.value}'>${tag.name}</option>`);
        }
        $(`#${id} #del_btn`).click(function () {
            $(`#${id}`).remove();
        });
        $(`#${id} #tag_select`).change(function () {
            let data = $(`#${id} #tag_select option:selected`).data();
            data = data.value.split(',')
            $(`#${id}`).find("#ul_select").html("");
            $(`#${id}`).find(".notShown.shown").remove();
            for (let val of data) {
                $(`#${id}`).find("#ul_select").append(`<li>${val}</li>`)
            }
        });
    });
    return id;
}