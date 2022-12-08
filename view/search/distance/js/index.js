function initMap() {
  var map;
  var marker = [];
  var infoWindow = [];
  nowlat = 35.68961234552176;
  nowlng = 139.70054265198277;
  cnt=0;
  var syncerWatchPosition = {
    count: 0,
    lastTime: 0,

  };

  // 地図の作成
  navigator.geolocation.watchPosition(successFunc); //現在の位置情報を取得
  function successFunc(position) {
    //////////
    ++syncerWatchPosition.count; // 処理回数
    var nowTime = ~~(new Date() / 1000); // UNIX Timestamp

    // 前回の書き出しから3秒以上経過していたら描写
    // 毎回HTMLに書き出していると、ブラウザがフリーズするため
    if ((syncerWatchPosition.lastTime + 3) > nowTime) {
      return false;
    }

    // 前回の時間を更新
    syncerWatchPosition.lastTime = nowTime;




    //////

    // document.getElementById('result').innerHTML = '<dt>緯度</dt><dd>' + position.coords.latitude + '</dd><dt>経度</dt><dd>' + position.coords.longitude;
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
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
        name: 'mappin 昭島駅',
        lat: 35.71356626795214,
        lng: 139.36089373205093,
        zyanru: 'うどん',
        en: 3,
        url: '/var/www/html/view/shop/details/index.php'
      }, {
        name: '新宿駅',
        lat: 35.68961234552176,
        lng: 139.70054265198277,
        zyanru: 'yakiniku',
        en: 2,
        url: '/var/www/html/view/shop/details/index.php'
      }, {
        name: '立川駅',
        lat: 35.69789465288291,
        lng: 139.41372912337377,
        zyanru: 'そば（蕎麦）',
        en: 3,
        url: '/var/www/html/view/shop/details/index.php'
      }, {
        name: '八王子駅',
        lat: 35.65548356603411,
        lng: 139.33887194651865,
        zyanru: '和食',
        en: 1,
        url: '/var/www/html/view/shop/details/index.php'
      }, {
        name: '山田駅',
        lat: 35.64445639423844,
        lng: 139.32114458669992,
        zyanru: '日本料理',
        en: 2,
        url:'/var/www/html/view/shop/details/index.php'
      }, {
        name: '日野駅',
        lat: 35.67959665443286,
        lng: 139.39419848644476,
        zyanru: '焼肉',
        en: 1,
        url: '/var/www/html/view/shop/details/index.php'
      }, {
        name: '池袋駅',
        lat: 35.72958118038057,
        lng: 139.71090009950856,
        zyanru: '焼肉',
        en: 2,
        url: '/var/www/html/view/shop/details/index.php'
      }
    ];
    let str1 = "";
    let str2 = "";
    kyorisel = document.getElementById('kmsel').value;
    let zyanrusel = "all";

    hit = [0];

    for (let i = 1; i < markerData.length; i++) {

      km = abc(nowlat, nowlng, markerData[i]['lat'], markerData[i]['lng']);
      if (km < kyorisel && (zyanrusel == markerData[i]['zyanru'] || zyanrusel === "all")) {
        okname = markerData[i]['name'];
        //str1 = str1 + okname + "までの距離" + km + "kmです ";
        hit.push(i);
      }

    }

    document.getElementById('kyori').innerHTML = str1;

    var mapLatLng = new google.maps.LatLng({
      lat: markerData[0]['lat'],
      lng: markerData[0]['lng']
    }); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
      center: mapLatLng, // 地図の中心を指定
      zoom: 14 // 地図のズームを指定
    });


    //}

    // マーカー毎の処理

    for (var i = 0; i < markerData.length; i++) {
      if (hit.includes(i)) {
        

        markerLatLng = new google.maps.LatLng({
          lat: markerData[i]['lat'],
          lng: markerData[i]['lng']
        }); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
          position: markerLatLng, // マーカーを立てる位置を指定
          map: map // マーカーを立てる地図を指定
        });

        infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
          content: '<div class="map">' + markerData[i]['name'] + '</div>' +
            '<a href="' + markerData[i]['url'] + '">' + "詳細" + '</a>'

          // 吹き出しに表示する内容

        });
        // マーカーにクリックイベントを追加
        markerEvent(i)


      }
    }

    marker[0].setOptions({ // mappin　現在地のマーカーのオプション設定
      icon: {
        url: markerData[0]['icon'], // マーカーの画像を変更
        scaledSize: new google.maps.Size(40, 40)
      }
    });


    // マーカーにクリックイベントを追加
    function markerEvent(i) {
     
        marker[i].addListener('click', function () { // マーカーをクリックしたとき
          infoWindow[i].open(map, marker[i]); // 吹き出しの表示
        });
      

    }


    //selectの値が変わった時の処理を書く
    //changeをformでかくのを試す
    $(function () {
      




      $('#form1').change(function () {
        let str1 = "";
        let str2 = "";
        kyorisel = document.getElementById('kmsel').value;
        let zyanrusel = document.getElementById('zyanrusel').value;
        let ensel = document.getElementById('ensel').value;
        hit = [0];
        let iti = 13;

        if (kyorisel == 1) {
          iti = 14;
        } else if (kyorisel == 3) {
          iti = 13;
        } else if (kyorisel == 5) {
          iti = 12;
        } else if (kyorisel == 10) {
          iti = 11;
        }





        var mapLatLng = new google.maps.LatLng({
          lat: markerData[0]['lat'],
          lng: markerData[0]['lng']
        }); // 緯度経度のデータ作成
        map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
          center: mapLatLng, // 地図の中心を指定
          zoom: iti // 地図のズームを指定
        });





        for (let i = 1; i < markerData.length; i++) {

          km = abc(nowlat, nowlng, markerData[i]['lat'], markerData[i]['lng']);
          if (km < kyorisel && (zyanrusel == markerData[i]['zyanru'] || zyanrusel === "all") && (ensel == 0 || ensel == markerData[i]['en'])) {
            okname = markerData[i]['name'];
            str1 = str1 + okname + "までの距離" + km + "kmです ";
            hit.push(i);
          }

        }

        // document.getElementById('kyori').innerHTML = str1;

        //}

        // マーカー毎の処理

        for (var i = 0; i < markerData.length; i++) {
          if (hit.includes(i)) {


            markerLatLng = new google.maps.LatLng({
              lat: markerData[i]['lat'],
              lng: markerData[i]['lng']
            }); // 緯度経度のデータ作成
            marker[i] = new google.maps.Marker({ // マーカーの追加
              position: markerLatLng, // マーカーを立てる位置を指定
              map: map // マーカーを立てる地図を指定
            });

            infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
              content: '<div class="map">' + markerData[i]['name'] + '</div>',// 吹き出しに表示する内容
              content: '<a href="' + markerData[i]['url'] + '">' + "" + '</a>'

            });

            // マーカーにクリックイベントを追加

            markerEvent(i);
          }
          initMap();
        }


        function markerEvent(i) {
          marker[i].addListener('click', function () { // マーカーをクリックしたとき
            infoWindow[i].open(map, marker[i]); // 吹き出しの表示
            $('#syousai').click(function () {
              location.href = markerData[i]['url'];
            });


          });
        }









        marker[0].setOptions({ // mappin　現在地のマーカーのオプション設定
          icon: {
            url: markerData[0]['icon'], // マーカーの画像を変更
            scaledSize: new google.maps.Size(40, 40)
          }
        });


        // マーカーにクリックイベントを追加
       


      });
    });



  }
  //2点の緯度、経度から距離を求める関数
  function abc(num1, num2, num3, num4) {
    const R = Math.PI / 180;
    num1 *= R;
    num2 *= R;
    num3 *= R;
    num4 *= R;
    return (6371 * Math.acos(Math.cos(num1) * Math.cos(num3) * Math.cos(num4 - num2) + Math.sin(num1) * Math.sin(num3)));


  }

}
//window.clickbutton = clickbutton;
window.initMap = initMap;

