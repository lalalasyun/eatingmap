<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';


if (isset($_GET['user'])) {
    $dbh = con();
    $res = get_shop_favorite_list($dbh, $_GET['user']);
    if ($res != null) {
        $json = array(
            "code" => "1",
            "data" => $res
        );
        echo json_encode($json);
        exit;
    }
}
echo '{"code":"0"}';
