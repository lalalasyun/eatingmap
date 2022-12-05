<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/authority/register_complite/css/style.css" />
    <script src="/web/view/authority/register_complite/js/index.js"></script>
    <title>登録完了画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/success.php"; ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php"?>
    </footer>
</body>

</html>