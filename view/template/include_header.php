<?php 
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;
$isMobile = $detect->isMobile();
session_start();
if($_SESSION['auth']){
    include dirname( __FILE__).'/header2.php';
}else{
    include dirname( __FILE__).'/header1.php';
}

?>
