<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    
    <title>メールアドレス認証</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php
        if (isset($_GET["id"])) {
            include "main/success.php";
        } else {
            include "main/faile.php";
        }
        ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>