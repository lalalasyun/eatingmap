<?php
if (isset($_POST["submit"]) && $_POST["submit"] == "click") {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/spring_conf.php';
    $data = array("name" => $_POST["name"], "account" => $_POST["id"], "password" => $_POST["pass"], "mail" => $_POST["mail"], "accessCode" => $CODE);
    $json = json_encode($data);
    $url = API_URL."/user/";
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
        $_GET['ref'] = null;
        header('Location: /view/authority/register_complite/');
        exit;
    } else {
        header('Location: /view/error/500/');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/authority/register/js/validate_rules.js"></script>
    <link rel="stylesheet" href="/libs/css/validate_style.css">
    
    <script src="/view/authority/register/js/no_automatic.js"></script>

    <link rel="stylesheet" type="text/css" href="/view/authority/register/css/style.css" />
    <title>eatingmap - 新規登録</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->

    <div class="main" id="main">
        <?php
        include "main/main.php";
        ?>

    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>