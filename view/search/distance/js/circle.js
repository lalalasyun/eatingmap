function pseudoGCircle(point, radius, color) {//中心地、半径色、
  var tex = 360;               // 頂点の数
  var eradius = 6378137; // 赤道半径 
  var ougi = 298.257223563;          // 扁平率の逆数

  // 離心率の２乗
  var risin = ((2 * ougi) - 1) / Math.pow(ougi, 2);

  // π × 赤道半径
  var PI_ER = Math.PI * eradius;

  // 1 - e^2 sin^2 (θ)
  var TMP = 1 - risin * Math.pow(Math.sin(point.lat() * Math.PI / 180), 2);

  // 経度１度あたりの長さ(m)
  var arc_lat = (PI_ER * (1 - risin)) / (180 * Math.pow(TMP, 3 / 2));
  // π × 赤道半径
  var PI_ER = Math.PI * eradius;

  // 1 - e^2 sin^2 (θ)
  var TMP = 1 - risin * Math.pow(Math.sin(point.lat() * Math.PI / 180), 2);

  // 経度１度あたりの長さ(m)
  var arc_lat = (PI_ER * (1 - risin)) / (180 * Math.pow(TMP, 3 / 2));

  // 緯度１度あたりの長さ(m)
  var arc_lng = (PI_ER * Math.cos(point.lat() * Math.PI / 180)) / (180 * Math.pow(TMP, 1 / 2));

  // 半径をｍ単位に
  var r = radius * 1000;
  var weight = 1;
  var opacity = 1.0;
  var points = new Array(tex);
  for (i = 0; i <= tex; i++) {
    var rad = (i / (tex / 2)) * Math.PI;
    var lat = (r / arc_lat) * Math.sin(rad) + point.lat();
    var lng = (r / arc_lng) * Math.cos(rad) + point.lng();
    points[i] = new google.maps.LatLng(lat, lng);
  }
  return new google.maps.Polyline({
    path: points,
    strokeColor: color,
    strokeOpacity: opacity,
    strokeWeight: weight,
    map: map
  });
}