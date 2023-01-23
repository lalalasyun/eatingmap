
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>

    <script src="/view/shop/details/js/map.js"></script>
    <script src="/view/shop/details/js/favorite.js"></script>
    <script src="/view/shop/details/js/script.js"></script>
    <script src="/view/shop/details/js/more_review.js" defer></script>

    <link rel="stylesheet" type="text/css" href="/view/shop/details/css/style.css" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@5.0.3/animations/shift-toward-subtle.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@5.0.3/themes/light-border.css">
    <script src="https://unpkg.com/popper.js@1" defer></script>
    <script src="https://unpkg.com/tippy.js@5" defer></script>
    <script src="/view/shop/details/js/tooltip.js" defer></script>

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