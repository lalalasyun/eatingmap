<?php
if (isset($_GET['id'])) {
  $dbh = con();
  $SHOP_DATA = get_id_shop_data($dbh, $_GET['id']);
  $REVIEW_DATA = check_user_review($dbh, $_SESSION['account'], $_GET['id']);
}
?>
<script>
  let shop_id = "<?= $SHOP_DATA['id'] ?>";
</script>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                      echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
  <div class="w-100 mt-3">
    <form id="input_area">
      <div class="d-flex justify-content-center">
        <div class="fs-2">レビュー登録</div>
      </div>

      <div class="d-flex justify-content-center">
        <div class="w-75">

          <div class="d-flex justify-content-center">
            <div class="fs-4" id="name"><?= $SHOP_DATA['name'] ?></div>
          </div>

          <hr class="mb-0">
          <div>
            <label class="form-label fs-4">評価</label>

            <div class="d-flex justify-content-center mt-0">
              <div id="rating">
                <span class="fa fa-star active" data-name="1"></span>
                <span class="fa fa-star-o" data-name="2"></span>
                <span class="fa fa-star-o" data-name="3"></span>
                <span class="fa fa-star-o" data-name="4"></span>
                <span class="fa fa-star-o" data-name="5"></span>
              </div>
            </div>
          </div>

          <hr class="mb-0">


          <div>
            <label class="form-label fs-4">内容</label>
            <textarea class="form-control" id="text" name="text"></textarea>
          </div>


        </div>
      </div>
    </form>
    <div class="d-flex justify-content-center my-3">
      <button class="btn btn-info btn-lg mx-2" onclick="location.href='/shop/<?= $SHOP_DATA['id'] ?>'">お店に戻る</button>
      <button class="btn btn-info btn-lg mx-2" id="submit_btn">登録</button>
    </div>
  </div>
</div>