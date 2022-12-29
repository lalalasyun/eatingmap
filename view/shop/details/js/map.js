function initMap() {
  var map;
  var marker = [];
  var infoWindow = [];
  let nowlat = 0;
  let nowlng = 0;


  // 地図の作成
  navigator.geolocation.getCurrentPosition(successFunc, error); //現在の位置情報を取得
  if (successFunc == false) {
    alert('era-');
  }
  function successFunc(position) {

    nowlat = position.coords.latitude;
    nowlng = position.coords.longitude;


    var markerData = [ // マーカーを立てる場所名・緯度・経度を格納する
      {
        name: '現在地',
        lat: nowlat,
        lng: nowlng,
        icon: '/images/seach_img/mappin.png' // mappin 現在地のマーカーだけイメージを変更する
      },

      {
        name: shop.name,
        lat: parseFloat(shop.lat),
        lng: parseFloat(shop.lng),
        url:shop.url,
        icon: '/images/seach_img/nowmark1.PNG'
      }
    ];

    //経路URLの生成
    let dir_url = `https://www.google.com/maps/dir/?api=1&destination=${shop.lat},${shop.lng}`;
    $("#dir_url").append(`<a href="${dir_url}"target="_blank" rel="noopener">Googleマップでルートを表示</a>`);
    var mapLatLng = new google.maps.LatLng({
      lat: markerData[1]['lat'],
      lng: markerData[1]['lng']
    }); // 緯度経度のデータ作成



    map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
      center: mapLatLng, // 地図の中心を指定
      zoom: 14 // 地図のズームを指定
    });

    // マーカー毎の処理

    for (var i = 0; i < markerData.length; i++) {
      markerLatLng = new google.maps.LatLng({
        lat: markerData[i]['lat'],
        lng: markerData[i]['lng']
      }); // 緯度経度のデータ作成
      marker[i] = new google.maps.Marker({ // マーカーの追加
        position: markerLatLng, // マーカーを立てる位置を指定
        map: map // マーカーを立てる地図を指定
      });

    }

    marker[0].setOptions({ // mappin　現在地のマーカーのオプション設定
      icon: {
        url: markerData[0]['icon'], // マーカーの画像を変更
        scaledSize: new google.maps.Size(40, 40)
      }
    });
    marker[1].setOptions({ // mappin　現在地のマーカーのオプション設定
      icon: {
        url: markerData[1]['icon'], // マーカーの画像を変更
        scaledSize: new google.maps.Size(40, 60)
      }
    });

    infoWindow[1] = new google.maps.InfoWindow({ // 吹き出しの追加
      content: '<div class="map">' + markerData[1]['name'] + '</div>' +
        //'<a href="' + markerData[1]['url'] + '">' + "詳細" + '</a>'// 吹き出しに表示する内容
        '<a href="' + `https://www.google.com/maps/dir/?api=1&destination=${shop.lat},${shop.lng}`+ '"target="_blank" rel="noopener">' + "google mapへ" + '</a>'// 吹き出しに表示する内容
    });
    markerEvent(1)

  }

  function markerEvent(i) {
    marker[i].addListener('click', function () { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示

      $('#syousai').click(function () {
        location.href = markerData[i]['url'];
      });
    });

  }

  function error(error) {

    if (error.code == 1) {
      alert('位置情報の取得を許可してください');
    } else if (error.code == 2) {
      alert('位置情報がタイムアウトしました。画面を更新してください');
    } else if (error.code == 3) {
      alert('位置情報の取得に失敗しました。取得した位置情報の精度が低いため利用できません。');
    }
    else {
      alert('位置情報の取得に失敗しました。エラーコード：' + error.code);
    }
  }

 


}
//window.clickbutton = clickbutton;
window.initMap = initMap;



