<?php
$_SESSION['prev_page'] = "/search/distance";
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/search/distance/css/style.css" />
    <script src="/view/search/distance/js/index.js"></script>
    <script src="/view/search/distance/js/change_form.js"></script>
    <script src="/view/search/distance/js/circle.js"></script>
    <script src="/libs/js/geolocation.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" >
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash:700 "rel="stylesheet">
   
    <title>eatingmap - 距離検索</title>
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