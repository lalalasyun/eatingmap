<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

ini_set( 'display_errors', 1 );
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';

$dbh = con();
$json = file_get_contents('php://input');
$data = json_decode($json, true);
update_shop($dbh,$data);
update_shop_tag($dbh,$data['id'],$data['tags']);

?>