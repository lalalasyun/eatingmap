
<div class="user_icon">
    <!--初期アイコン-->
    <img class="text_img" src="images/user_icon/user_init_icon.png"
        style="width:100px; height:auto;margin-top:10px; margin-left:10vh">
</div>
<div>


  <div class=" d-flex align-items-start justify-content-center">
    <h1 style="font-size:350%;">距離検索</h1>
  </div>
  <p></p>


<div class="text-center">
  <form id="form1" style="font-size:150%;">
  
    ジャンル検索<select id="zyanrusel">
      <option value="all">すべて</option>
      <option value="wa">和食</option>
      <option value="you">洋食</option>
      <option value="tyu">中華</option>
      <option value="iza">居酒屋</option>
      <option value="ra">ラーメン</option>
      <option value="su">スイーツ</option>

    </select>



    距離選択<select id="kmsel">
      <option value=1>1km</option>
      <option value=3>3km</option>
      <option value=5>5km</option>
      <option value=10>10km</option>

    </select>


    価格選択<select id="ensel">
      <option value=0>すべて</option>
      <option value=1>￥</option>
      <option value=2>￥￥</option>
      <option value=3>￥￥￥</option>

    </select>
   
  </form>
  </div>


  

  <h3 id="kyori"></h3>
  <h3 id="result"></h3>
  <div id="map" style="width:100%;height:500px;bottom:3px;"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrCeM0xkKwrBQegrMJXkHc10UtrjLz7yo&callback=initMap&v=weekly" defer></script>
</div>