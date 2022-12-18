<?php
$dbh = con();
$data = get_category($dbh);
?>
<div class=" d-flex align-items-start justify-content-center">
  <h1 style="font-size:350%;">距離検索</h1>
</div>
<div class="d-flex justify-content-center">

  <div class="d-flex fs-4">
    <div>
      <label>ジャンル検索</label>
      <select id="genre">
        <option value="0">ジャンルを選択</option>
        <?php foreach ($data as list($id, $name)) { ?>
          <option value="<?= $id ?>"><?= $name ?></option>
        <?php } ?>
      </select>
    </div>

    <div>
      <label>距離選択</label>
      <select id="kmsel">
        <option value=1>1km</option>
        <option value=3>3km</option>
        <option value=5>5km</option>
        <option value=10>10km</option>
        <option value=30>30km</option>
      </select>
    </div>

    <div>
      <label>価格選択</label>
      <select id="price">
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

<div id="map" class="w-100" style="height:500px;"></div>
<?php
require_once dirname(__FILE__, 5) . "/conf/map_conf.php"
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
</div>