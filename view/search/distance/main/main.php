<?php
$dbh = con();
$data = get_category($dbh);
?>

<div class=" d-flex align-items-start justify-content-center">
  <h1 style="font-size:350%;">距離検索</h1>
</div>
<div class="d-flex justify-content-center">

  <div class="d-flex fs-4 my-3">
  <div class="mx-2">
      <select id="kmsel" class="old-select form-select">
        <option value="30">距離選択</option>
        <option value=1>1km</option>
        <option value=3>3km</option>
        <option value=5>5km</option>
        <option value=10>10km</option>
        <option value=30>30km</option>
      </select>
    </div>
    
    <div class="mx-2">
      <select id="genre" class="form-select">
        <option value="0">ジャンルを選択</option>
        <option value="99">すべて</option>
        <?php foreach ($data as list($id, $name)) { ?>
          <option value="<?= $id ?>"><?= $name ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="mx-2">
      <select id="price" class="form-select">
        <option value="50000">予算</option>
        <option value="1500">1000円</option>
        <option value="1500">1500円</option>
        <option value="3000">3000円</option>
        <option value="5000">5000円</option>
        <option value="10000">10000円</option>
        <option value="50000">50000円</option>
      </select>
    </div>
  </div>
</div>

<div id="map" class="w-100" style="height: 800px;"></div>
<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/conf/map_conf.php"
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
</div>
<div id="result_list" class="mt-5" style="height:150px;overflow: hidden;">
  <!--mapに表示されている店を表示 class="slider"-->

  <div class="mt-5" style="height:150px;overflow: hidden;">
    <ul class="slider" id="list">
    </ul>
  </div>

</div>