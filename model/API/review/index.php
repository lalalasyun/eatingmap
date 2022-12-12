<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';

if (isset($_GET['id']) && isset($_GET['index'])) {
    $dbh = con();

    $result = get_user_review($dbh, $_GET['id'], $_GET['index']);

    $result[0]['user_id'] = (string)$result[0]['user_id'];
    $result[0]['shop_id'] = (string)$result[0]['shop_id'];
    $json = array(
        "code"=>1,
        "data"=>$result
    );
    echo json_encode($json);
    exit;
}
echo "{'code':0}";