<!DOCTYPE html>
<html lang="ja">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/authority/register_complite/css/style.css" />
    <script src="/view/authority/register_complite/js/index.js"></script>
    <title>登録完了画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/success.php"; ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_footer.php"?>
    </footer>
</body>

</html>