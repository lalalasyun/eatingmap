<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/avatar/buy/css/style.css" />
    <script src="/view/avatar/buy/js/index.js"></script>
    <title>アイテム購入画面</title>

</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php
        if (isset($_GET['code']) && $_GET['code'] == 1) {
            include "main/success.php";
        }else if(isset($_GET['code']) && $_GET['code'] == 0){
            include "main/faile.php";
        }else{
            include "main/main.php";
        }
        ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>