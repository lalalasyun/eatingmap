<?php
//https://app.eatingmap.fun/api/review_register/index.php?user=@&shop=@&text=@&score=@
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';


if (isset($_POST['user']) && isset($_POST['shop']) && isset($_POST['score']) && isset($_POST['text'])) {
    $dbh = con();

    $REVIEW_DATA = check_user_review($dbh, $_POST['user'], $_POST['shop']);
    if ($REVIEW_DATA == null) {
        $init_point = 200;
        //ポイントを付与(200ポイント+文字数ポイント)
        $bonus_point = strlen($_POST['text']);
        add_user_point($dbh, $_POST['user'], $init_point + $bonus_point);
    }

    $result = update_shop_review($dbh, $_POST['user'], $_POST['shop'], $_POST['text'], $_POST['score']);

    echo 'true';
    exit;
}
echo 'false';
