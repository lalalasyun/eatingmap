<?php
//現在のページの名前を取得
$page = "mail";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    
    <title>メールアドレス認証</title>
    <script src="/view/authority/mail_confirm/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/authority/mail_confirm/css/style.css" />
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