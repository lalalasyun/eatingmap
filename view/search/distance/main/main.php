<div class=" d-flex align-items-start justify-content-center">
  <h1 style="font-size:350%;">距離検索</h1>
</div>
<div class="text-center">
  <form id="form1" style="font-size:150%;">

    <label>ジャンル検索</label>
    <select id="zyanrusel">
      <option value="all">すべて</option>
      <option value="yakiniku">焼肉</option>
      <option value="そば（蕎麦）">そば（蕎麦）</option>
      <option value="和食">和食</option>
      <option value="日本料理">日本料理</option>
      <option value="焼肉">焼肉</option>

    </select>


    <label>距離選択</label>
    <select id="kmsel">
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
<?php
require_once dirname(__FILE__, 5) . "/conf/map_conf.php"
?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
</div>