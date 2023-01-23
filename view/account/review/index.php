<?php
if (isset($_GET['id'])) {
    $dbh = con();
    delete_shop_review($dbh, $_SESSION['account'], $_GET['id']);
    header("Location: /view/account/review/");
    exit;
}
?>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" type="text/css" href="/view/account/review/css/style.css" />
    <script src="/view/account/review/js/index.js"></script>
    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>
    <title>eatingmap - レビュー履歴</title>

    <link rel="stylesheet" type="text/css" href="/libs/css/page_button.css" />
    <script src="/libs/js/page_btn.js" defer></script>

    <script src="/libs/js/lock.js"></script>
    <link rel="stylesheet" type="text/css" href="/libs/css/loader.css" />

</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>
    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php"; ?>
    </footer>
</body>

</html>