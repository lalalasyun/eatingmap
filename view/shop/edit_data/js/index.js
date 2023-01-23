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
            let tag_val = JSON.parse(tag.value)
            let id = await set_tag_form(tag_val);
            await new Promise(s => setTimeout(s, 100));
            $(`#${id} #tag_select`).val(tag.name);
            $(`#${id} #tag_select`).trigger('change');
            
            for (let val of tag_val) {
                $(`#${id}`).find("#div_select").append(`<a class="notShown shown" style=""><em>${val}</em><i></i></a>`)
            }
        }

    });
    $("#tag_select").change(function () {
        let ary = $("#tag_select option:selected").data('value');
    });
    $(`#add_btn`).click(function () {
        $(".selectMultiple > div .arrow, .selectMultiple > div span").parent().parent().removeClass('open');
        let tags = get_val();
        if (tags.slice(-1)[0] && tags.slice(-1)[0].tags == '[]') {
            return;
        }
        if (tags.length == TAG_DATA.length) return;
        set_tag_form();
        $(".tag-form #tag-error").remove();
    });

    $('#submit').on('click', function () {
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
        for (let tag of tags) {
            if (tag.tags == "[]") {
                $(".tag-form").append(`<label id="tag-error" class="error" >タグが設定されていません。</label>`);
                return;
            }
        }
        let json = {
            id: shop_id,
            name: name,
            location: location,
            description: description,
            phone: phone,
            station: station,
            price: price,
            genre: genre,
            type: type,
            tags: tags
        }

        $.ajax({
            type: "post",                // method = "POST"
            url: `${data_list.apiUrl}/api/shop/edit/index.php`,        // POST送信先のURL
            data: JSON.stringify(json),  // JSONデータ本体
            contentType: 'application/json', // リクエストの Content-Type
            dataType: "json"           // レスポンスをJSONとしてパースする
        });
        window.location.href = `/view/shop/edit_data/index.php?code=1`;
    })

    $('#back_btn').on('click', function () {
        var select = confirm("変更を破棄しますか？");
        if (select) {
            History_back();
        }
    });

});
async function set_tag_form(tag_val = []) {
    const id = Date.now();
    $('.tag-form').append(`<div id="${id}" class="d-flex tag_form">`);
    await $(`#${id}`).load('/view/shop/edit_data/main/template.html', function (myData, myStatus) {
        let tags = get_val();
        for (let tag of TAG_DATA) {
            const isTagSet = (name) => {
                for (let value of tags) {
                    if (value.name == name) {
                        return true;
                    }
                }
            }
            if (isTagSet(tag.name)){
                continue;
            } 
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
                const isTagSet = (val) => {
                    for(let tag of tag_val){
                        if(tag == val) return true;
                    }
                }
                if (isTagSet(val)){
                    continue;
                }  
                $(`#${id}`).find("#ul_select").append(`<li>${val}</li>`)
                
            }
        });
    });
    return id;
}