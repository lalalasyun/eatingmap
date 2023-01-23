<?php
if (isset($_POST['name']) && isset($_POST['text'])) {
    set_user_prof($dbh, $_SESSION['account'], $_POST['name'], $_POST['text']);
    header("Location: /view/account/mypage/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/profile/edit/css/style.css" />

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/profile/edit/js/validate_rules.js"></script>
    <link rel="stylesheet" href="/libs/css/validate_style.css">

    <script src="/view/profile/edit/js/index.js"></script>

    <title>eatingmap - プロフィール編集</title>
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