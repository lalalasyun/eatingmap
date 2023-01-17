<?php
if (isset($_GET['id'])) {
  $dbh = con();
  $SHOP_DATA = get_id_shop_data($dbh, $_GET['id']);
  $REVIEW_DATA = check_user_review($dbh, $_SESSION['account'], $_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/shop/register_review/css/style.css" />

    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>
    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>
    <script src="/view/shop/register_review/js/index.js"></script>

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/shop/register_review/js/validate_rules.js"></script>
    <link rel="stylesheet" href="/libs/css/validate_style.css">
    

    <title>eatingmap - レビュー登録 - <?= $SHOP_DATA['name'] ?></title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php
        if (isset($_GET['code']) && $_GET['code'] == 1) {
            include "main/success.php";
        } else if (isset($_GET['code']) && $_GET['code'] == 0) {
            include "main/faile.php";
        } else {
            include "main/main.php";
        }
        ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>