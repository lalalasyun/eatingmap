<?php
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';
if (isset($_GET['id'])) {
    $dbh = con();
    $result = get_id_shop_data($dbh, $_GET['id']);
    $json = array(
        "code"=>1,
        "data"=>$result
    );
    echo json_encode($json);
    exit;
}
echo "{'code':0}";