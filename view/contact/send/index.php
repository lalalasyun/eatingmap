<?php 
include dirname(__FILE__, 4) . "/conf/map_conf.php";

//現在のページの名前を取得
$path = explode("/", __DIR__);
$page = $path[count($path)-1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>

    <link rel="stylesheet" type="text/css" href="/view/contact/send/css/style.css" />
    <script src="/view/contact/send/js/index.js"></script>
    <script src="/view/contact/send/js/ajax.js"></script>
    <script src="/view/contact/send/js/adress.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=<?= $KEY;?>"></script>

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/contact/send/js/validate_rules.js"></script>
    

    <title>お問い合わせフォーム</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php"; ?>
    </footer>
</body>

</html>