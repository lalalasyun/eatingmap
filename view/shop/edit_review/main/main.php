<?php
if (isset($_GET['id'])) {
    $dbh = con();
    $SHOP_DATA = get_id_shop_data($dbh, $_GET['id']);
    $REVIEW_DATA = check_user_review($dbh, $_SESSION['account'], $_GET['id']);
}
?>
<script>
    let score = <?= $REVIEW_DATA['score'] ?>;
    let shop_id = "<?= $SHOP_DATA['id'] ?>";
</script>
<div class="d-flex  justify-content-center m-4">
    <div class="border rounded w-75">
        <div class="d-flex justify-content-center m-3">
            <h1>レビュー編集</h1>
        </div>
        <div class="d-flex justify-content-center m-3">
            <div class="mw-50">
                <div class="d-flex">
                    <div class="fs-4">店舗名</div>
                    <div class="fs-4 mx-5" id="name"><?= $SHOP_DATA['name'] ?></div>
                </div>
                <div class="d-flex mw-100">
                    <div class="fs-4">評価</div>
                    <div id="rating" class="w-75">
                        <?php for ($i = 1; $i < 6; $i++) { ?>
                            <?php if ($i == $REVIEW_DATA['score']) { ?>
                                <span class="fa fa-star active" data-name="<?= $i ?>"></span>
                            <?php } else if ($i < $REVIEW_DATA['score']) { ?>
                                <span class="fa fa-star "data-name= "<?= $i ?>"></span>
                            <?php } else { ?>
                                <span class="fa fa-star-o" data-name="<?= $i ?>"></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="fs-4">
                    <label class="form-label">内容</label>
                    <textarea class="form-control" id="text"><?= $REVIEW_DATA['text'] ?></textarea>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button class="btn btn-info btn-lg mx-2" onclick="location.href='/shop/<?= $SHOP_DATA['id'] ?>'">お店に戻る</button>
                    <button class="btn btn-info btn-lg mx-2" id="submit_btn">編集</button>
                </div>
            </div>
        </div>

    </div>
</div>