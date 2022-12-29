let nowmarker;
let mapLatLng;
function initMap() {
  const iti = 14;
  navigator.geolocation.getCurrentPosition(successFunc, error);//現在の位置情報を取得

  // 地図の作成
  function successFunc(position) {
    nowlat = position.coords.latitude;
    nowlng = position.coords.longitude;
    nowmarker = {
      name: '現在地',
      lat: nowlat,
      lng: nowlng,
      icon: '/images/seach_img/mappin.png' // mappin 現在地のマーカーだけイメージを変更する
    }
    // 緯度経度のデータ作成
    mapLatLng = new google.maps.LatLng({
      lat: nowmarker.lat,
      lng: nowmarker.lng
    });

    let map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
      center: mapLatLng, // 地図の中心を指定
      zoom: iti // 地図のズームを指定
    });

    // マーカー毎の処理

    let mark = new google.maps.Marker({ // マーカーの追加
      position: mapLatLng, // マーカーを立てる位置を指定
      map: map // マーカーを立てる地図を指定
    });

    mark.setOptions({ // mappin　現在地のマーカーのオプション設定
      icon: {
        url: nowmarker.icon, // マーカーの画像を変更
        scaledSize: new google.maps.Size(40, 40)
      }
    });

    var color = '#ff0000';
    pseudoGCircle(map, mapLatLng, 1, color);
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
