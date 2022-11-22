$(function () {
    $("#next_btn").click(async function () {
        var result = $.ajax({
            type: 'GET',
            url: 'http://10.42.96.32/web/view/config/config.json',
            dataType: "json",
            async: false
        }).responseText;
        //testdata
        result = {
            "count": 3,
            "shop":[
                {
                    "name":"aa",
                    "description":"aru"
                },
                {
                    "name":"bb",
                    "description":"bi"
                },
                {
                    "name":"cc",
                    "description":"naibi"
                },
            ]
        }

        let temp = ''
        console.log(result);
        $("#shop_list").load("main/template.html")
    })

});