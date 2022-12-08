<?php   
    $page = explode("/", __DIR__)[count(explode("/", __DIR__)) - 1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/avatar/buy/css/style.css" />
    <script src="/web/view/avatar/buy/js/index.js"></script>
    <title>アイテム購入画面</title>
    
</head>

<body >
    <!--ヘッダー-->
    <header>
        <?php include dirname(__FILE__, 3) . "/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname(__FILE__, 3) . "/template/footer.php" ?>
    </footer>
</body>
</html>