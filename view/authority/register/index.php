<?php
/* 本番環境用メールアドレス認証チェック
    session_start();
    if(!isset($_SESSION['register_event']) || !$_SESSION['register_event']){
        header('Location: /web/view/error/404/');
        exit;
    }
    */
if ($_POST["submit"] == "click") {
    $data = array("name" => $_POST["name"], "account" => $_POST["id"], "password" => $_POST["pass"], "mail" => $_POST["mail"], "accessCode" => "96B03FFE95FE199A413E64AFB98BE3F9");
    $json = json_encode($data);
    $url = 'https://app.eatingmap.fun/user';
    // 送信時のオプション

    $context = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => implode("\r\n", array('Content-Type: application/json; charset=utf-8;','Content-Length:'.strlen($json))),
            'content' => $json
        )
    );
    $html = file_get_contents($url, false, stream_context_create($context));
    header('Location: /web/view/authority/register_complite/');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="/web/libs/css/bootstrap/bootstrap.min.css">
    <script src="/web/libs/js/bootstrap/bootstrap.min.js"></script>
    <script src="/web/libs/js/jquery/jquery-3.6.0.min.js"></script>
    <script src="/web/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/web/libs/js/jquery/additional-methods.min.js"></script>
    <script src="js/validate_rules.js"></script>
    <script src="js/no_automatic.js"></script>
    <title>新規登録</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname(__FILE__, 3) . "/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->

    <div class="main" id="main">
        <?php
        include "main/main.php";
        ?>

    </div>

    <!--フッター-->
    <footer>
        <?php include dirname(__FILE__, 3) . "/template/footer.php" ?>
    </footer>
</body>

</html>