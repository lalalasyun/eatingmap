<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/error/500/css/style.css" />
    <script src="/web/view/error/500/js/index.js"></script>
    <title>エラー</title>
</head>

<body>
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