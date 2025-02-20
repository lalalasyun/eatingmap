<html lang="ja">
    
<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/main/home/css/main.css" />

    <script src="/view/main/home/js/index.js" defer></script>
    <script src="/view/main/home/js/slider.js" defer></script>
    
    <script src="/libs/js/load_city/load_city.js"></script>
    <script src="/libs/js/load_city/pref_city.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/view/main/home/css/slider.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="/libs/js/accordion.js"></script>
    <link rel="stylesheet" type="text/css" href="/libs/css/accordion.css" />



    <title>eatingmap - 飲食店情報サイト</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/view/template/include_header.php";
        ?>
        <!--main_user.phpとmain_owner.phpを切り替える-->
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main_user.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_footer.php" ?>
    </footer>
</body>

</html>