
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/shop/details/css/style.css" />

    <script src="/view/shop/details/js/map.js"></script>
    <script src="/view/shop/details/js/favorite.js"></script>
    <script src="/view/shop/details/js/script.js"></script>
    <script src="/view/shop/details/js/more_review.js" defer></script>

    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    
    <title><?= $SHOP_DATA["name"] ?> - eatingmap</title>
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