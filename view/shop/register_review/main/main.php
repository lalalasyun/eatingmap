
<script>
  let shop_id = "<?= $SHOP_DATA['id'] ?>";
</script>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                      echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
  <div class="w-100 mt-3">
    <form id="input_area">
      <div class="d-flex justify-content-center">
        <h3 class="fs-2">レビュー登録</h3>
      </div>

      <div class="d-flex justify-content-center">
        <div class="w-75">

          <div class="d-flex justify-content-center">
            <div class="fs-4" id="name"><?= $SHOP_DATA['name'] ?></div>
          </div>

          <div class='d-flex justify-content-between'>
            <div class="d-flex align-items-center">
              <label class="form-label fs-4 m-0">評価</label>
            </div>
            

            <div class="d-flex justify-content-center mt-2">
              <div id="rating">
                <span class="fa fa-star active" data-name="1"></span>
                <span class="fa fa-star-o" data-name="2"></span>
                <span class="fa fa-star-o" data-name="3"></span>
                <span class="fa fa-star-o" data-name="4"></span>
                <span class="fa fa-star-o" data-name="5"></span>
              </div>
            </div>
            <div></div>
          </div>

          <hr class="mt-1 mb-0">


          <div>
            <label class="form-label fs-4">内容</label>
            <textarea class="form-control" id="text" name="text"></textarea>
          </div>


        </div>
      </div>
    </form>
    <div class="d-flex justify-content-center my-3">
      <a class="btn_18"><i class="fa-solid fa-shop"></i> お店に戻る</a>
      <a class="btn_18" id="submit_btn"><i class="fa-solid fa-user-pen"></i> 登録する</a>
    </div>
  </div>
</div>