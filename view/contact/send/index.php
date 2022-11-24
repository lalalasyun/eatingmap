<?php include dirname(__FILE__, 4) . "/conf/map_conf.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="/web/libs/css/bootstrap/bootstrap.min.css">
    <script src="/web/libs/js/bootstrap/bootstrap.min.js"></script>
    <script src="/web/libs/js/jquery/jquery-3.6.0.js"></script>
    <script src="js/index.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=<?= $KEY;?>"></script>
    

    <title>お問い合わせフォーム</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname(__FILE__, 3) . "/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname(__FILE__, 3) . "/template/footer.php"; ?>
    </footer>
</body>

</html>