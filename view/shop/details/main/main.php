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
    let shop = null;
    <?php if (isset($SHOP_DATA)) { ?>
        shop = {
            "name": "<?= $SHOP_DATA["name"] ?>",
            "lat": "<?= $SHOP_DATA["latitude"] ?>",
            "lng": "<?= $SHOP_DATA["longitude"] ?>",
            "url": "<?= "/shop/" . $SHOP_DATA["id"] ?>",
            "image": "<?= $SHOP_DATA['image'] ?>",
            "id": "<?= $SHOP_DATA['id'] ?>",
            "address": "<?= $SHOP_DATA['location1'] ?>"
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
                <div class="fs-1 font-kosugi"><?= $SHOP_DATA['name'] ?></div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 mb-5">
            <div class="boximg border border-dark rounded p-3 w-100">
                <div style="max-height: 400px;overflow: hidden; ">
                    <div class="d-flex justify-content-center d-flex align-items-center">
                        <img src="/images/shopImage/<?= $SHOP_DATA["image"] ?>" loading="lazy" width='50%' height="auto" alt="店舗画像" title="<?= $SHOP_DATA['name'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <h1 class='headline'>
            詳細
        </h1>
        <div class="d-flex justify-content-center">
            <div class="box1 border border-dark rounded p-3 w-100">
                <div>住所 : <?= $SHOP_DATA["location1"] ?></div>

                <div class="hr my-2"></div>

                <div class="d-flex">
                    <div>評価 : </div>
                    <div id="rating" class="ms-2 cap" data-tippy-content="<?= $SHOP_DATA['score'] ? "".$SHOP_DATA['score']."" : "データが登録されていません。" ?>">
                        <?php for ($i = 1; $i < 6; $i++) { ?>
                            <?php if ($i == $SHOP_DATA['score']) { ?>
                                <span class="fa fa-star active" data-name="<?= $i ?>"></span>
                            <?php } else if ($i < $SHOP_DATA['score']) { ?>
                                <span class="fa fa-star " data-name="<?= $i ?>"></span>
                            <?php } else { ?>
                                <span class="fa fa-star-o" data-name="<?= $i ?>"></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="hr my-2"></div>

                <?php if (!$isMobile) { ?>
                    <div class="d-flex justify-content-start">
                        <?php if ($SHOP_DATA["price"]) { ?>
                            <div>予算：<?= $SHOP_DATA["price"] . "円" ?></div>
                        <?php } ?>

                        <?php if ($SHOP_DATA["phone"]) { ?>
                            <div class="ms-5">電話番号：<?= $SHOP_DATA["phone"] ?></div>
                        <?php } ?>

                        <?php if ($SHOP_DATA['close_station']) { ?>
                            <div class="ms-5">最寄り駅：<?= $SHOP_DATA['close_station'] ?></div>
                        <?php } ?>
                    </div>
                    <div class="hr my-2"></div>
                <?php } else { ?>
                    <?php if ($SHOP_DATA["price"]) { ?>
                        <div>予算：<?= $SHOP_DATA["price"] . "円" ?></div>
                        <div class="hr my-2"></div>
                    <?php } ?>

                    <?php if ($SHOP_DATA["phone"]) { ?>
                        <div>電話番号：<?= $SHOP_DATA["phone"] ?></div>
                        <div class="hr my-2"></div>
                    <?php } ?>

                    <?php if ($SHOP_DATA['close_station']) { ?>
                        <div>最寄り駅：<?= $SHOP_DATA['close_station'] ?></div>
                        <div class="hr my-2"></div>
                    <?php } ?>

                <?php } ?>
                <?php if (!$isMobile) { ?>
                    <div class="d-flex justify-content-start">
                        <?php foreach ($TAG_DATA as $TAG) { ?>
                            <div class="me-5"><?php print_r($TAG['name'] . "：" . preg_split('/[\[\"\]]/', $TAG['value'])[2]); ?></div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <?php foreach ($TAG_DATA as $TAG) { ?>
                        <div class="me-5"><?php print_r($TAG['name'] . "：" . preg_split('/[\[\"\]]/', $TAG['value'])[2]); ?></div>
                    <?php } ?>
                <?php } ?>


            </div>
        </div>
        <?php if ($SHOP_DATA["info1"] != "") { ?>
            <div class="mt-5">
                <h1 class="headline">説明</h1>
                <div class="box1 border border-dark rounded p-3 w-100">
                    <div><?= str_replace(PHP_EOL, '<br>', $SHOP_DATA["info1"]); ?></div>
                </div>
            </div>
        <?php } ?>


        <div class="mt-5">
            <h1 class="headline">マップ</h1>
            <div class="d-flex justify-content-center">

                <div class="box1 border border-dark rounded p-5  w-100" id="map" style="height:500px;">

                    <div>
                        <?php
                        require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/map_conf.php"
                        ?>
                        <script src="https://maps.googleapis.com/maps/api/js?key=<?= $KEY; ?>&callback=initMap&v=weekly" defer></script>
                    </div>
                </div>
            </div>
            <div id="dir_url"></div>

        </div>
        <div class="mt-5 w-100 d-flex">
            <?php if ($_SESSION['auth'] && check_user_review($dbh, $_SESSION['account'], $SHOP_DATA["id"])) { ?>
                <div>
                    <a class="fav-btn btn-tag btn-tag--favorite inherited-styles" href="/view/shop/edit_review/index.php?id=<?= $SHOP_DATA['id'] ?>&click=/shop/<?= $SHOP_DATA["id"] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        レビュー<?php if (!$isMobile) { ?>編集<?php } ?>
                    </a>
                </div>
            <?php } else { ?>
                <div>
                    <?php if ($_SESSION['auth']) { ?>
                        <a class="fav-btn btn-tag btn-tag--favorite inherited-styles" href='/view/shop/register_review/index.php?id=<?= $SHOP_DATA['id'] ?>'>
                            <i class="fa-solid fa-comment"></i>
                            レビュー<?php if (!$isMobile) { ?>登録<?php } ?>
                        </a>
                    <?php } else { ?>
                        <a class="fav-btn btn-tag btn-tag--favorite inherited-styles" href='/view/authority/login/'>
                            <i class="fa-solid fa-comment"></i>
                            レビュー<?php if (!$isMobile) { ?>登録<?php } ?>
                        </a>
                    <?php } ?>
                </div>

            <?php } ?>

            <div class="ms-3">
                <?php
                $is_fav = is_user_shop_favorite($dbh, $_SESSION['account'], $SHOP_DATA["id"]);
                ?>
                <div id="add_fav" style="display:<?= $is_fav ? "none" : "block" ?>">
                    <a class="fav-btn btn-tag btn-tag--favorite inherited-styles" data-name="<?= $i ?>">
                        <i class="fas fa-star"></i>
                        お気に入り<?php if (!$isMobile) { ?>追加<?php } ?></a>
                </div>
                <div id="del_fav" style="display:<?= $is_fav ? "block" : "none" ?>">
                    <a class="fav-btn btn-tag btn-tag--favorite inherited-styles" data-name="<?= $i ?>">
                        <i class="fa-regular fa-star"></i></i>
                        お気に入り<?php if (!$isMobile) { ?>解除<?php } ?></a>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-2 mb-4">
            <?php if (count($REVIEW_DATA) != 0) { ?>
                <div class="border box2 box1 border-dark rounded py-2 px-3 w-100 h-100">
                    <?php foreach ($REVIEW_DATA as $counter => $REVIEW) { ?>
                        <div>
                            <?php if ($counter != 0) { ?>
                                <div class="hr my-2"></div>
                            <?php } ?>
                            <div title="プロフィール">
                                <a href="/user/<?= $REVIEW['account'] ?>" class="d-flex">
                                    <div>
                                        <iframe src="/icon/<?= $REVIEW['account'] ?>" width="30px" height="30px" loading="lazy" style="pointer-events: none;"></iframe>
                                    </div>
                                    <div class="ms-2">
                                        <?= $REVIEW['name'] ?>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="w-75 d-flex">
                                    <div>
                                        評価 :
                                    </div>
                                    <div id="rating" class="ms-2">
                                        <?php for ($i = 1; $i < 6; $i++) { ?>
                                            <?php if ($i == $REVIEW['score']) { ?>
                                                <span class="fa fa-star active" data-name="<?= $i ?>"></span>
                                            <?php } else if ($i < $REVIEW['score']) { ?>
                                                <span class="fa fa-star " data-name="<?= $i ?>"></span>
                                            <?php } else { ?>
                                                <span class="fa fa-star-o" data-name="<?= $i ?>"></span>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $date = new DateTimeImmutable($REVIEW['update_time']);
                            ?>
                            <div><?= $date->format('Y年n月j日') ?>にレビュー済み</div>
                            <div>
                                <div class="box1 box-close py-2">
                                    <?= str_replace(PHP_EOL, '<br>', $REVIEW["text"]); ?>
                                </div>
                                <div class="review_more" data-more-flg='true'><i class="fa-solid fa-angle-down"></i>続きを見る</div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>
</div>