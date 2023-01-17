<?php
if (isset($USER_DATA['shop_id'])) {
    $SHOP_DATA = get_id_shop_data($dbh, $USER_DATA['shop_id']);
    $GENRE_DATA = get_category($dbh);
    $TYPE_DATA = get_type($dbh);
    $TAG_DATA  = get_shop_tag($dbh, $SHOP_DATA["id"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <script src="/view/shop/edit_data/js/index.js"></script>
    <title>eatingmap - 店舗情報更新 - <?= $SHOP_DATA['name'] ?></title>

    <script src="/view/shop/edit_data/js/multiple.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/shop/edit_data/css/multiple.css" />

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/shop/edit_data/js/validate_rules.js"></script>
    <link rel="stylesheet" href="/libs/css/validate_style.css">
    
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php if (isset($_GET['code']) && $_GET['code'] == 1) {
            include "main/success.php";
        }  else {
            include "main/main.php";
        } ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>