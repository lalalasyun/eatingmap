<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/contact/completion/css/style.css" />
    <script src="/view/contact/completion/js/index.js"></script>
    <title>テンプレート画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php"?>
    </footer>
</body>

</html>