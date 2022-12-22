<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/account/mypage/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <script src="/view/account/mypage/js/index.js"></script>
    
    <title>マイページ</title>
</head>

<body >
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
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_footer.php"; ?>
    </footer>
</body>

</html>