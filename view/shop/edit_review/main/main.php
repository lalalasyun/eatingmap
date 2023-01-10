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
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 mt-3">
        <form id="input_area">
            <div class="d-flex justify-content-center">
                <div class="fs-2">レビュー編集</div>
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
                                <?php for ($i = 1; $i < 6; $i++) { ?>
                                    <?php if ($i == $REVIEW_DATA['score']) { ?>
                                        <span class="fa fa-star active" data-name="<?= $i ?>"></span>
                                    <?php } else if ($i < $REVIEW_DATA['score']) { ?>
                                        <span class="fa fa-star " data-name="<?= $i ?>"></span>
                                    <?php } else { ?>
                                        <span class="fa fa-star-o" data-name="<?= $i ?>"></span>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0">

                    <div class="fs-4">
                        <label class="form-label">内容</label>
                        <textarea class="form-control" id="text" name="text"><?= $REVIEW_DATA['text'] ?></textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center my-3">
            <button class="btn btn-info btn-lg mx-2" onclick="History_back();">戻る</button>
            <button class="btn btn-info btn-lg mx-2" id="submit_btn">変更</button>
        </div>
    </div>
</div>