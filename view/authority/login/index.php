<?php
//現在のページの名前を取得
$path = explode("/", __DIR__);
$page = $path[count($path) - 1];
if (isset($_GET['user_account_id'])) {
    $_SESSION['auth'] = true;
    $_SESSION['account'] = $_GET['user_account_id'];
    header("Location: /web/view/main/home/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/authority/login/css/style.css" />
    <script src="/web/libs/js/ajax.js"></script>
    <script src="/web/view/authority/login/js/index.js"></script>
    <title>ログイン</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname(__FILE__, 3) . "/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname(__FILE__, 3) . "/template/footer.php" ?>
    </footer>
</body>

</html>