<?php
$dbh = con();
$REVIEW_DATA = get_shopid_review($dbh, $SHOP_DATA["id"]);
$TAG_DATA  = get_shop_tag($dbh, $SHOP_DATA["id"]);

if (!$isMobile) {
    $REVIEW_LENGTH = 50;
} else {
    $REVIEW_LENGTH = 30;
}

?>
<script>
    let shop_id = null;
    let loc = null;
    <?php if (isset($SHOP_DATA)) { ?>
        loc = {
            "lat": "<?= $SHOP_DATA["latitude"] ?>",
            "lng": "<?= $SHOP_DATA["longitude"] ?>"
        };
        shop_id = "<?= $SHOP_DATA["id"] ?>";
    <?php } ?>
</script>

<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100">

        <div class="d-flex justify-content-center">

            <div class="d-flex align-items-end">
                <p class="fs-1"><?= $SHOP_DATA['name'] ?></p>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 mb-5">
            <div class="boximg border border-dark rounded p-3 w-100">
                <div style="max-height: 400px;overflow: hidden; ">
                    <div class="d-flex justify-content-center d-flex align-items-center">
                        <img src="/images/shopImage/<?= $SHOP_DATA["image"] ?>" class="w-50">
                    </div>
                </div>
            </div>
        </div>
        <h1 style="background-color:#FFD9D7;">
            詳細
        </h1>
        <div class="d-flex justify-content-center">
            <div class="box1 border border-dark rounded p-3 w-100">

                <div>住所 : <?= $SHOP_DATA["location1"] ?></div>
                <hr>
                <div class="d-flex justify-content-start">
                    <div>評価 : <?= $SHOP_DATA["score"] ?></div>
                    <div class="ms-5">市区町村 : <?= $SHOP_DATA["area"] ?></div>
                    <div class="ms-5">予算 : <?= $SHOP_DATA["price"] ?><?php echo ("~") ?></div>
                    <div class="ms-5">電話番号 : <?= $SHOP_DATA["phone"] ?></div>
                    <div class="ms-5">最寄り駅：<?= $SHOP_DATA['close_station'] ?></div>
                </div>
                <hr>
                <div class="d-flex justify-content-start">
                    <?php foreach ($TAG_DATA as $TAG) { ?>
                        <div class="me-5"><?php print_r($TAG['name'] . "：" . preg_split('/[\[\"\]]/', $TAG['value'])[2]); ?></div>
                    <?php } ?>
                </div>
                <hr>
                <div style="background-color:#FFD9D7;">説明文</div>
                <div><?= $SHOP_DATA["info1"] ?></div>

            </div>
        </div>
        <div class="mt-5">
            <h1 style="background-color:#FFD9D7;">マップ</h1>
            <div class="d-flex justify-content-center">

                <div class="box1 border border-dark rounded p-5  w-100" id="map" style="height:500px;">

                    <div>
                        <?php
                        require_once dirname(__FILE__, 5) . "/conf/map_conf.php"
                        ?>
                        <script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-5 w-100 d-flex">
            <?php if ($_SESSION['auth']) { ?>
                <?php if (check_user_review($dbh, $_SESSION['account'], $SHOP_DATA["id"])) { ?>
                    <div>
                        <button class="btn btn-info btn-lg" onclick="location.href=`/view/shop/edit_review/index.php?id=<?= $SHOP_DATA['id'] ?>`">
                            レビュー編集
                        </button>
                    </div>
                <?php } else { ?>
                    <div>
                        <button class="btn btn-info btn-lg" onclick="location.href='/view/shop/register_review/index.php?id=<?= $SHOP_DATA['id'] ?>'">
                            レビュー登録
                        </button>
                    </div>
                <?php } ?>
                <div class="ms-3">
                    <?php
                    $add = "";
                    $del = "";
                    if (is_user_shop_favorite($dbh, $_SESSION['account'], $SHOP_DATA["id"])) {
                        $add = "style='display:none'";
                    } else {
                        $del = "style='display:none'";
                    }

                    ?>
                    <button id="add_fav" class="btn btn-info btn-lg" <?= $add ?>>
                        ★お気に入り追加
                    </button>
                    <button id="del_fav" class="btn btn-info btn-lg " <?= $del ?>>
                        ★お気に入り解除
                    </button>
                </div>
            <?php } ?>
        </div>

        <div class="d-flex justify-content-center mt-2">
            <div class="border box1 border-dark py-2 px-3 w-100 h-100">

                <?php foreach ($REVIEW_DATA as $REVIEW) { ?>
                    <div class="d-flex justify-content-between mb-4">ユーザー名 : <?= get_userid_user($dbh, $REVIEW['user_id'])['name'] ?>
                        <div>投稿日 : <?= $REVIEW['create_time'] ?></div>
                        <div>更新日 : <?= $REVIEW['update_time'] ?></div>
                    </div>
                    <div>
                        <?php

                        $ary_text = mb_str_split($REVIEW['text'], $REVIEW_LENGTH);
                        ?>

                        <?php $count = 0; ?>
                        <div class="border border-dark py-2 px-3 mb-3">
                            <?php foreach ($ary_text as $text) { ?>
                                <?php if ($count++ > 5) {
                                    break;
                                } ?>
                                <?= $text ?><br>
                            <?php } ?>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div>
                                評価 : <?= $REVIEW['score'] ?>
                            </div>
                            <div>
                                <button class="btn btn-info btn-sm" onclick="location.href='/user/<?= $REVIEW['user_id'] ?>'">
                                    プロフィール
                                </button>
                            </div>

                        </div>
                        <hr>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>