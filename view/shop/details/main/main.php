<?php
$dbh = con();
$REVIEW_DATA = get_shopid_review($dbh, $SHOP_DATA["id"]);
?>
<script>
    let loc = null;
    <?php if (isset($SHOP_DATA)) { ?>
        loc = {
            "lat": "<?= $SHOP_DATA["latitude"] ?>",
            "lng": "<?= $SHOP_DATA["longitude"] ?>"
        };
    <?php } ?>
</script>
<div class=" d-flex justify-content-center ">
    <div class="mt-5">
        <img src="/web/images/shopImage/<?= $SHOP_DATA["image"] ?>" height="75px">
        <div class="d-flex justify-content-center ">
            <p class="fs-1"><?= $SHOP_DATA['name'] ?></p>
        </div>
        <h1 style="background-color:#FFD9D7;">
            詳細
        </h1>
        <div class="d-flex justify-content-center">
            <div class="box1 border border-dark rounded p-3">

                <div>住所 : <?= $SHOP_DATA["location1"] ?></div>
                <hr>
                <div class="d-flex justify-content-start">
                    <div>市区町村 : <?= $SHOP_DATA["area"] ?></div>
                    <div class="ms-5">予算 : <?= $SHOP_DATA["price"] ?><?php echo("~")?></div>
                   <div class="ms-5">電話番号 : <?= $SHOP_DATA["phone"] ?></div> 
                </div>
                <hr>
                <div style="background-color:#FFD9D7;">説明文</div>
                <div><?= $SHOP_DATA["info1"] ?></div>

            </div>
        </div>
        <div class="mt-5">
            <h1 style="background-color:#FFD9D7;">マップ</h1>
            <div class="d-flex justify-content-center">

                <div class="box1 border border-dark rounded p-5" id="map" style="width:100%;height:500px;bottom:3px;">

                    <div>
                        <?php
                        require_once dirname(__FILE__, 5) . "/conf/map_conf.php"
                        ?>
                        <script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
                    </div>
                </div>
            </div>

        </div>


        <div class="d-flex justify-content-center mt-5">
            <div class="box2 border border-dark p-5 h-100" style="overflow: scroll;">
                <?php foreach ($REVIEW_DATA as $REVIEW) { ?>
                    <div>
                        <p>レビュー</p>
                        <div>ユーザー名 : <?= get_userid_user($dbh, $REVIEW['user_id'])['name'] ?></div>
                        <div>文章 : <?= $REVIEW['text'] ?></div>
                        <div>投稿日 : <?= $REVIEW['create_time'] ?></div>
                        <div>更新日 : <?= $REVIEW['update_time'] ?></div>
                        <button class="btn btn-info btn-lg" onclick="location.href='/user/<?= $REVIEW['user_id'] ?>'"></button>
                    </div>

                <?php } ?>

            </div>

        </div>
        <?php if ($_SESSION['auth']) { ?>
            <?php if (check_user_review($dbh, $_SESSION['account'], $SHOP_DATA["id"])) { ?>
                <div>
                    <div>
                        <button class="btn btn-info btn-lg" onclick="location.href='/web/view/shop/edit_review/'">
                            レビュー編集
                        </button>
                    </div>
                </div>
            <?php } else { ?>
                <div>
                    <div>
                        <button class="btn btn-info btn-lg" onclick="location.href='/web/view/shop/register_review/'">
                            レビュー登録
                        </button>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div id="a"></div>
        <div class="mt-5 d-flex justify-content-center mb-5">
            <button class="btn btn-primary d-grid gap-2 col-6 btn-lg">戻る</button>
        </div>
    </div>
</div>