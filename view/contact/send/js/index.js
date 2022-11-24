function viewChange() {
    if (document.getElementById('sample')) {
        id = document.getElementById('sample').value;
        if (id == '1') {
            document.getElementById('Box1').style.display = "";
            document.getElementById('Box2').style.display = "none";
            document.getElementById('Box3').style.display = "none";
            document.getElementById('Box4').style.display = "none";
        } else if (id == '2') {
            document.getElementById('Box1').style.display = "none";
            document.getElementById('Box2').style.display = "";
            document.getElementById('Box3').style.display = "none";
            document.getElementById('Box4').style.display = "none";
        } else if (id == '3') {
            document.getElementById('Box1').style.display = "none";
            document.getElementById('Box2').style.display = "none";
            document.getElementById('Box3').style.display = "";
            document.getElementById('Box4').style.display = "none";
        } else if (id == '4') {
            document.getElementById('Box1').style.display = "none";
            document.getElementById('Box2').style.display = "none";
            document.getElementById('Box3').style.display = "none";
            document.getElementById('Box4').style.display = "";
        } else if (id == '0') {
            document.getElementById('Box1').style.display = "none";
            document.getElementById('Box2').style.display = "none";
            document.getElementById('Box3').style.display = "none";
            document.getElementById('Box4').style.display = "none";
        }
    }
    

    window.onload = viewChange;
}
/////住所から緯度経度返還
var geocoder;
        var map;

      
            geocoder = new google.maps.Geocoder(); //giocoderの宣言
           

        function codefrom() { //緯度経度変換の関数
            var from = document.getElementById("from").value;
            if (geocoder) {
                geocoder.geocode({
                        'address': from,
                        'region': 'jp'
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {



                            for (var r in results) {
                                if (results[r].geometry) {
                                    var lat_lng = results[r].geometry.location;


                                    //lat_lng.lat();
                                    // lat_lng.lng();

                                }
                            }

                        }
                    });
            }
        }
    
