<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/main/home/css/main.css" />

    <script src="/view/main/home/js/index.js"></script>
    <script src="/libs/js/load_city/load_city.js"></script>
    <script src="/libs/js/load_city/pref_city.js"></script>
    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/view/main/home/css/slider.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <title>メイン画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php
        include dirname( __FILE__ , 3)."/template/include_header.php";
        ?>
        <!--
            main_user.phpとmain_owner.phpを切り替える
        -->
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main_user.php" ?>
        <!--
            main_user.phpとmain_owner.phpを切り替える
        -->
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php" ?>
    </footer>
    <script src="/view/main/home/js/slider.js"></script>
</body>

</html>