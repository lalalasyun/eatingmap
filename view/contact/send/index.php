<?php
$json = "";
if (isset($_POST['name'])) {
    $dbh = con();
    $req =  $_POST['select1'];
    $del =  $_POST['select2'];
    $add =  $_POST['select3'];
    $data = null;
    $user_id = "0";
    if(isset($USER_DATA['id'])){
        $user_id = $USER_DATA['id'];
    }
    if ($req == "question") {
        send_ask_form($dbh,$user_id,$_POST['name'],$_POST['question'],$_POST['user_mail']);
    }
    if ($req == "del" && $del == "shop") {
        send_del_shop_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name']);
    }
    if ($req == "del" && $del == "emp") {
        send_del_emp_form($dbh,$user_id,$_POST['note'],$_POST['shop_id'],$_POST['shop_name'],$_POST['name']);
    }
    if ($req == "add" && $add == "shop") {
        send_add_shop_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name'],$_POST['shop_address']);
    }
    if ($req == "add" && $add == "emp") {
        send_add_emp_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name'],$_POST['phone']);
    }
    if ($req == "other") {
        send_other_form($dbh,$user_id,$_POST['name'],$_POST['message'],$_POST['user_mail']);
    }
    header('Location: /view/contact/completion/index.php?code=1');
}
include dirname(__FILE__, 4) . "/conf/map_conf.php";


//現在のページの名前を取得
$path = explode("/", __DIR__);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>

    <link rel="stylesheet" type="text/css" href="/view/contact/send/css/style.css" />
    <script src="/view/contact/send/js/index.js"></script>
    <script src="/view/contact/send/js/ajax.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=<?= $KEY; ?>"></script>

    <script src="/libs/js/jquery/jquery.validate.min.js"></script>
    <script src="/libs/js/jquery/additional-methods.min.js"></script>
    <script src="/view/contact/send/js/validate_rules.js"></script>


    <title>お問い合わせフォーム</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php"; ?>
    </footer>
</body>

</html>