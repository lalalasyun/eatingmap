function viewChange() {
    if (document.getElementById('sample')) {
        $("#input_area").find(".box").hide();
        id = document.getElementById('sample').value;
        if (id == 'question') {
            $('#question').show();
        } else if (id == 'other') {
            $('#other').show();
        } else if (id == 'del') {
            $('#del').show();
        } else if (id == 'add') {
            $('#add').show();
        }
    }
    window.onload = viewChange;
}
function add_viewChange() {
    if (document.getElementById('add')) {
        $("#input_area").find(".box").hide();
        $('#shop_address').removeClass('d-flex');
        id = document.getElementById('select_add').value;
        $('#add').show();
        if (id == 'shop') {
            $('#shop_name').show();
            $('#shop_address').addClass('d-flex');
            $('#note').show();
        } else if (id == 'emp') {
            $('#shop_name').show();
            $('#phone').show();
            $('#note').show();
        }
    }
    window.onload = add_viewChange;
}
function del_viewChange() {
    if (document.getElementById('del')) {
        $("#input_area").find(".box").hide();
        id = document.getElementById('select_del').value;
        $('#del').show();
        if (id == 'shop') {
            $('#shop_name').show();
            $('#note').show();
        } else if (id == 'emp') {
            $('#shop_name').show();
            $('#note').show();
        }
    }
    window.onload = add_viewChange;
}
/////住所から緯度経度返還
// var geocoder;
// var map;
// geocoder = new google.maps.Geocoder(); //giocoderの宣言
// function codefrom() { //緯度経度変換の関数
//     var from = document.getElementById("from").value;
//     if (geocoder) {
//         geocoder.geocode({
//             'address': from,
//             'region': 'jp'
//         },
//             function (results, status) {
//                 if (status == google.maps.GeocoderStatus.OK) {
//                     for (var r in results) {
//                         if (results[r].geometry) {
//                             var lat_lng = results[r].geometry.location;
//                             //lat_lng.lat();
//                             // lat_lng.lng();
//                         }
//                     }
//                 }
//             });
//     }
// }