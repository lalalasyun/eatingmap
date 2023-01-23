
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
            <a class="btn_18" id="back_btn" data-href="<?= $_GET['click'] ?>"><i class="fa-solid fa-eraser"></i>戻る</a>
            <a class="btn_18" id="submit_btn"><i class="fa-solid fa-pen-to-square"></i>変更する</a>
        </div>
    </div>
</div>