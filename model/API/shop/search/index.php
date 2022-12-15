<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';

$dbh = con();

$res = search_shop($dbh, $_GET['name'],$_GET['genre'], $_GET['pref'] , $_GET['city'], $_GET['price']);

echo json_encode($res, JSON_UNESCAPED_UNICODE);
