async function geocode(from) {//緯度経度変換の関数
    /////住所から緯度経度返還
    var geocoder;
    var location;
    geocoder = new google.maps.Geocoder(); //giocoderの宣言
    //var from = ""//住所を格納
    if (geocoder) {
        await geocoder.geocode({
            'address': from,//調べたい店の住所
            'region': 'jp'
        }, async function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {//正常のに動けたら
                for (var r in results) {
                    if (results[r].geometry) {
                        let result = results[r].geometry.location;//緯度経度取得
                        location = {
                            lat:result.lat(),
                            lng:result.lng()
                        }
                    }
                }
            }
        });
    }
    return location;
}
//geolocationを読み込む
/*<script src="https://cdn.geolonia.com/community-geocoder.js"></script>　
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDrCeM0xkKwrBQegrMJXkHc10UtrjLz7yo"></script>*/