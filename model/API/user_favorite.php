<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';


if (isset($_GET['user']) && isset($_GET['shop']) && isset($_GET['code'])) {
    $dbh = con();
    if($_GET['code'] == "add"){
        add_shop_favorite($dbh, $_GET['user'], $_GET['shop']);
    }else if($_GET['code'] == "del"){
        del_shop_favorite($dbh, $_GET['user'], $_GET['shop']);
    }
    echo 'true';
    exit;
}
echo 'false';
