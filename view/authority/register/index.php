<?php
$page = "mail";
session_start();
if (!isset($_SESSION['register_event']) || !$_SESSION['register_event']) {
    header('Location: /web/view/error/1510/');
    exit;
}

if ($_POST["submit"] == "click") {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/web/conf/spring_conf.php';
    $data = array("name" => $_POST["name"], "account" => $_POST["id"], "password" => $_POST["pass"], "mail" => $_POST["mail"], "accessCode" => $CODE);
    $json = json_encode($data);
    $url = 'https://app.eatingmap.fun/user';
    // 送信時のオプション

    $context = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => implode("\r\n", array('Content-Type: application/json; charset=utf-8;', 'Content-Length:' . strlen($json))),
            'content' => $json
        )
    );
    $res = file_get_contents($url, false, stream_context_create($context));
    $data = json_decode($res, true);
    if ($data['code'] === 1) {
        $_SESSION['register_event'] = false;
        header('Location: /web/view/authority/register_complite/');
        exit;
    }else{
        header('Location: /web/view/error/500/');
        exit;
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/authority/register/css/style.css" />
    <script src="/web/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/web/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/web/view/authority/register/js/validate_rules.js"></script>
    <script src="/web/view/authority/register/js/no_automatic.js"></script>
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