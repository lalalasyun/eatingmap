
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/authority/mail_certification/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/view/authority/mail_certification/css/loader.css" />

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/authority/mail_certification/js/validate_rules.js"></script>
    
    <script src="/view/authority/mail_certification/js/index.js"></script>
    <script src="/view/authority/mail_certification/js/lock.js"></script>
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
        if (isset($_GET['code'])) {
            if ($_GET['code'] == 1) {
                include "main/success.php";
            }else{
                include "main/faile.php";
            }
        } else {
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