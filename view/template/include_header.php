<?php 
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;
$isMobile = $detect->isMobile();
session_start();

if(!$isMobile){
    //PC用ヘッダ
    include dirname( __FILE__).'/header/pc.php';
}else{
    //スマートフォン用ヘッダ
    include dirname( __FILE__).'/header/phone.php';
}

?>
