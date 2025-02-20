<?php
//現在のページの名前を取得
$path = explode("/", __DIR__);
if (isset($_GET['user_account_id'])) {
    $_SESSION['auth'] = true;
    $_SESSION['account'] = $_GET['user_account_id'];
    if (isset($_GET['ref'])) {
        header("Location: " . $_GET['ref']);
    } else {
        header("Location: /view/main/home/");
    }
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/authority/login/css/style.css" />
    <script src="/libs/js/ajax.js"></script>
    <script src="/view/authority/login/js/index.js"></script>
    <title>eatingmap - ログイン</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>