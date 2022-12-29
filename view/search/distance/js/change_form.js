$(function () {
    $('#genre,#kmsel,#price').change(async function () {
        let price = $("#price").val();
        let genre = $("#genre").val();
        let distance = $("#kmsel").val();
        let infoWindow = [];

        let iti = 13;

        if (distance == 1) {
            iti = 14;
        } else if (distance == 3) {
            iti = 13;
        } else if (distance == 5) {
            iti = 12;
        } else if (distance == 10) {
            iti = 11;
        } else {
            iti = 10;
        }


        let map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
            center: mapLatLng, // 地図の中心を指定
            zoom: iti // 地図のズームを指定
        });

        new google.maps.Marker({ // マーカーの追加
            position: mapLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
        }).setOptions({ // mappin　現在地のマーカーのオプション設定
            icon: {
                url: nowmarker.icon, // マーカーの画像を変更
                scaledSize: new google.maps.Size(40, 40)
            }
        });
        console.log(genre)

        let json = {};
        if(genre != 0 && genre != 99){
            json.genre = genre;
        }
        json.price = price;

        await $.get("https://app.eatingmap.fun/api/shop/search/index.php", json
        ).done(async function (data) {

            try {
                for (let shop of data) {
                    if (shop.location1 == "") continue;
                    let location;
                    if (shop.longitude == 0 || shop.latitude == 0) {
                        location = await geocode(shop.location1);
                        //緯度経度が登録されてなければ登録する
                        $.get('https://app.eatingmap.fun/api/geolocation/index.php',
                            {
                                id: shop.id,
                                lat: location.lat,
                                lng: location.lng
                            });
                        await new Promise(s => setTimeout(s, 500))
                        console.log('登録完了')
                    } else {
                        location = {
                            lat: shop.latitude,
                            lng: shop.longitude
                        }
                    }
                    let json = {
                        name: shop.name,
                        lat: location.lat,
                        lng: location.lng,
                        url: `/shop/${shop.id}`
                    }
                    let km = abc(nowmarker.lat, nowmarker.lng, json.lat, json.lng);
                    if (km < distance) {

                        let mark = new google.maps.Marker({ // マーカーの追加
                            // マーカーを立てる位置を指定
                            position: new google.maps.LatLng({
                                lat: json.lat,
                                lng: json.lng
                            }), 
                            map: map // マーカーを立てる地図を指定
                        });

                        // marker.push(mark);

                        let info = new google.maps.InfoWindow({ // 吹き出しの追加
                            content: '<div class="map">' + json['name'] + '</div>' +
                                '<a href="' + json['url'] + '">' + "詳細" + '</a>'// 吹き出しに表示する内容
                        });

                        infoWindow.push(info);

                        markerEvent(mark, info, json);
                        continue;
                    }

                }
            } catch (error) {
                console.log(error)
            }

            var color = '#ff0000';
            pseudoGCircle(map,mapLatLng, distance, color);

            function markerEvent(mark, info, data) {
                mark.addListener('click', async function () { // マーカーをクリックしたとき
                    for (let info of infoWindow) {
                        info.close(map, info);
                    }

                    info.open(map, mark); // 吹き出しの表示

                    $('#syousai').click(function () {
                        location.href = data['url'];
                    });
                });

            }
        });

    });


    //2点の緯度、経度から距離を求める関数
    function abc(num1, num2, num3, num4) {
        const R = Math.PI / 180;
        num1 *= R;
        num2 *= R;
        num3 *= R;
        num4 *= R;
        return (6371 * Math.acos(Math.cos(num1) * Math.cos(num3) * Math.cos(num4 - num2) + Math.sin(num1) * Math.sin(num3)));
    }
});