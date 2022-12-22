$(function () {
    $('#genre,#kmsel,#price').change(async function () {
        let price = $("#price").val();
        let genre = $("#genre").val();
        let distance = $("#kmsel").val();
        infoWindow = [];

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

        let json = {
            genre: genre,
            price: price
        }

        var mapLatLng = new google.maps.LatLng({
            lat: nowmarker['lat'],
            lng: nowmarker['lng']
        }); // 緯度経度のデータ作成
        map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
            center: mapLatLng, // 地図の中心を指定
            zoom: iti // 地図のズームを指定
        });

        await $.get("https://app.eatingmap.fun/api/shop/search/index.php", json
        ).done(async function (data) {

            try {
                markerData.splice(1, markerData.length);
                marker.splice(1, markerData.length);
                for (let shop of data) {
                    if (shop.location1 == "") continue;
                    let url = `/shop/${shop.id}`;
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
                    let name = shop.name;
                    let json = {
                        name: name,
                        lat: location.lat,
                        lng: location.lng,
                        url: url
                    }
                    let km = abc(nowmarker.lat, nowmarker.lng, json.lat, json.lng);
                    if (km < distance) {
                        markerData.push(json);
                        markerLatLng = new google.maps.LatLng({
                            lat: json['lat'],
                            lng: json['lng']
                        }); // 緯度経度のデータ作成

                        let mark = new google.maps.Marker({ // マーカーの追加
                            position: markerLatLng, // マーカーを立てる位置を指定
                            map: map // マーカーを立てる地図を指定
                        });
        
                        marker.push(mark);
        
                        infoWindow.push(new google.maps.InfoWindow({ // 吹き出しの追加
                            content: '<div class="map">' + json['name'] + '</div>' +
                                '<a href="' + json['url'] + '">' + "詳細" + '</a>'// 吹き出しに表示する内容
                        }));

                        markerEvent(mark,json);
                        continue;
                    }

                }
            } catch (error) {
                console.log(error)
            }



            // hit = [0];
            // for (let i = 1; i < markerData.length; i++) {
            //     let km = abc(nowmarker.lat, nowmarker.lng, markerData[i]['lat'], markerData[i]['lng']);
            //     if (km < distance) {
            //         hit.push(i);
            //     }
            // }
            var color = '#ff0000';
            pseudoGCircle(mapLatLng, distance, color);

            // infoWindow = [];
            // shop_list = [];

            // マーカー毎の処理
            // for (var i of hit) {
            //     markerLatLng = new google.maps.LatLng({
            //         lat: markerData[i]['lat'],
            //         lng: markerData[i]['lng']
            //     }); // 緯度経度のデータ作成

            //     marker[i] = new google.maps.Marker({ // マーカーの追加
            //         position: markerLatLng, // マーカーを立てる位置を指定
            //         map: map // マーカーを立てる地図を指定
            //     });

            //     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
            //         content: '<div class="map">' + markerData[i]['name'] + '</div>' +
            //             '<a href="' + markerData[i]['url'] + '">' + "詳細" + '</a>'// 吹き出しに表示する内容
            //     });
            //     // マーカーにクリックイベントを追加

            //     if (!i == 0) {
            //         markerEvent(i);
            //         shop_list.push(markerData[i]);
            //     }
            // }

            function markerEvent(mark,data) {
                mark.addListener('click', async function () { // マーカーをクリックしたとき
                    for (let info of infoWindow) {
                        info.close(map, info);
                    }

                    infoWindow[i].open(map, mark); // 吹き出しの表示

                    $('#syousai').click(function () {
                        location.href =data['url'];
                    });
                });

            }
            marker[0].setOptions({ // mappin　現在地のマーカーのオプション設定
                icon: {
                    url: nowmarker['icon'], // マーカーの画像を変更
                    scaledSize: new google.maps.Size(40, 40)
                }
            });
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

    ///////////////////////////
    // for (var i = 0; i < markerData.length; i++) {

    //     if (hit.includes(i)) {
    //         markerData[i]['name']

    //     }

    // }


    /////////////////////////////////

    // var li = document.createElement('li');
    // li.textContent = shop_list[i];
    // document.getElementById('list').appendChild(li);

    // for (var i = 0; i < shop_list.length; i++) {
    //     var li = document.createElement('li');
    //     li.textContent = shop_list[i];
    //     document.getElementById('list').appendChild(li);
    // }




});