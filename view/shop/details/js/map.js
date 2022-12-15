function initMap() {
    var map;
    var marker = [];
    var infoWindow = [];
    nowlat = 0;
    nowlng = 0;
    
  
    var syncerWatchPosition = {
      count: 0,
      lastTime: 0,
  
    };
  
    // 地図の作成
    navigator.geolocation.watchPosition(successFunc); //現在の位置情報を取得
    if(successFunc==false){
      alert('era-');
    }
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
          lat: parseFloat(loc.lat),
          lng: parseFloat(loc.lng),
        }
      ];
     
      let z=0;
      
      km = abc(nowlat, nowlng, markerData[1]['lat'], markerData[1]['lng']);
      var mapLatLng = new google.maps.LatLng({
        lat: markerData[0]['lat'],
        lng: markerData[0]['lng']
      }); // 緯度経度のデータ作成

      if(km<1){
        z=14;
      }else if(km<3){
      z=13.5;
      }else if(km<5){
        z=13;
      }else if(km<10){
        z=12.5;
      }else if(km<25){
        z=12;
      }else{
        z=10;
      }

      map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: z // 地図のズームを指定
      });
  
  
      //}
  
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

      
  
    }



    function error(error){

      if(error.code==1){
        alert('位置情報の取得を許可してください');
      }else if(error.code==2){
        alert('位置情報がタイムアウトしました。画面を更新してください');
      }else if(error.code==3){
        alert('位置情報の取得に失敗しました。取得した位置情報の精度が低いため利用できません。');
      }
      else{
        alert('位置情報の取得に失敗しました。エラーコード：' + error.code);
      }



      
     }
     
    navigator.geolocation.getCurrentPosition(successFunc,error);
    
     
    
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

  
  
  