<?php
$_SESSION['prev_page'] = "/search/genre";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/search/genre/css/style.css" />
    <title>eatingmap - ジャンル検索</title>

    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>

    <script src="/libs/js/load_city/load_city.js"></script>
    <script src="/libs/js/load_city/pref_city.js"></script>

    <script src="/view/search/genre/js/select_box.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/search/genre/css/select_box.css" />

    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="/libs/css/accordion.css" />
    <script src="/libs/js/accordion.js"></script>

    <script src="/libs/js/lock.js"></script>
    <link rel="stylesheet" type="text/css" href="/libs/css/loader.css" />
    
    <link rel="stylesheet" type="text/css" href="/libs/css/page_button.css" />
    <script src="/libs/js/page_btn.js" defer></script>

    <?php if($isMobile){ ?>
        <link rel="stylesheet" type="text/css" href="/view/search/genre/css/shop_phone.css" />
    <?php }else{ ?>
        <link rel="stylesheet" type="text/css" href="/view/search/genre/css/shop_pc.css" />
    <?php } ?>
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