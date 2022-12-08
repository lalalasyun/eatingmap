<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/search/genre/css/style.css" />
    <title>ジャンル検索</title>

    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>

    <script src="/libs/js/load_city/load_city.js"></script>
    <script src="/libs/js/load_city/pref_city.js"></script>

    <script src="/view/search/genre/js/select_box.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/search/genre/css/select_box.css" />

    <script src="/view/search/genre/js/accordion.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/search/genre/css/accordion.css" />

    <script src="/view/search/genre/js/index.js"></script>
</head>

<body >
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>
    

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php";?>
    </footer>
</body>

</html>