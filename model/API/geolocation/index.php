<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';
if(isset($_GET['id']) && isset($_GET['lat']) && isset($_GET['lng'])){
    $dbh = con();
    set_geocode($dbh,$_GET['id'],$_GET['lat'],$_GET['lng']);
}
