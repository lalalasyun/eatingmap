
<script>
    let point = <?= $USER_DATA['point'] ?>;
</script>
<div class="container d-flex justify-content-center <?php if (!$isMobile) {
                                                        echo "w-75 my-4";
                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="d-flex justify-content-center">
            <h1>購入アイテム選択</h1>
        </div>
        <?php if (count($heads) + count($backs) + count($clothes) != 0) { ?>
            <div class="d-flex justify-content-around">
                <fieldset>
                    <form action="" method="post">
                        <?php if (count($heads) != 0) { ?>
                            <div class="mb-3 heads">
                                <div class="d-flex justify-content-around">
                                    <h1>🎩選択</h1>
                                </div>
                                <div class="overflow-div">
                                    <?php for ($i = 0; $i < count($heads); $i++) {  ?>

                                        <label>
                                            <figure>
                                                <input type="checkbox" name="radio1[]" value="<?= $i; ?>" class="radio" data-point="<?= $heads[$i]['point']; ?>">
                                                <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?>" class="radio_image" id="head" title="<?= $heads[$i]['name'] ?>">
                                                <figcaption><?= $heads[$i]['point']; ?>point</figcaption>
                                            </figure>
                                        </label>

                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (count($clothes) != 0) { ?>
                            <div class="mb-3 clothes">
                                <div class="d-flex justify-content-around">
                                    <h1>服選択</h1>
                                </div>

                                <div class="overflow-div">

                                    <?php for ($i = 0; $i < count($clothes); $i++) {  ?>

                                        <label>
                                            <figure>
                                                <input type="checkbox" name="radio2[]" value="<?= $i; ?>" class="radio" data-point="<?= $clothes[$i]['point']; ?>">
                                                <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " class="radio_image" title="<?= $clothes[$i]['name'] ?>">
                                                <figcaption><?= $clothes[$i]['point']; ?>point</figcaption>
                                            </figure>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (count($backs) != 0) { ?>
                            <div class="mb-3 backs">
                                <div class="d-flex justify-content-around">
                                    <h1>背景選択</h1>
                                </div>
                                <div class="overflow-div">
                                    <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                                        <label>
                                            <figure>
                                                <input type="checkbox" name="radio3[]" value="<?= $i; ?>" class="radio" data-point="<?= $backs[$i]['point']; ?>">
                                                <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " class="radio_image" title="<?= $backs[$i]['name'] ?>">
                                                <figcaption><?= $backs[$i]['point']; ?>point</figcaption>
                                            </figure>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="d-flex fs-3">
                            <div>残りポイント : </div>
                            <div id="point"><?= $USER_DATA['point'] ?></div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="/view/account/mypage/" class="btn btn-primary btn-lg" type="button" style="color:azure">戻る</a>
                            <input id="submit_btn" class="btn btn-primary btn-lg mx-2" type="submit" value="購入" disabled>
                        </div>
                    </form>
                </fieldset>
            </div>
        <?php } else { ?>
            <div class="d-flex justify-content-center">
                <h4>購入できるアイテムはありません</h4>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/view/account/mypage/" class="btn btn-primary btn-lg" type="button" style="color:azure">戻る</a>
            </div>
        <?php } ?>
    </div>
</div>