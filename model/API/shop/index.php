<?php
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
$shop_id = "null";
if (isset($_GET['id'])) {
    $shop_id = $_GET['id'];
}

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';
$dbh = con();
$name = get_id_shop_name($dbh, $shop_id);

$data = array(
    "code" => null,
    "data" => null
);
if ($name == null) {
    $data['code'] = 0;
} else {
    $data['code'] = 1;
    $data['data'] = $name;
}

echo json_encode($data);
