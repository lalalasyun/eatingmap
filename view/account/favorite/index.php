<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/account/favorite/css/style.css" />
    <script src="/view/account/favorite/js/index.js"></script>

    <script src="/libs/js/lock.js"></script>
    <link rel="stylesheet" type="text/css" href="/libs/css/loader.css" />
    
    <link rel="stylesheet" type="text/css" href="/libs/css/page_button.css" />
    <script src="/libs/js/page_btn.js" defer></script>

    <title>マイページ</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_footer.php";?>
    </footer>
</body>

</html>