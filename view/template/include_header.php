<?php
$this_page = explode("/", $page)[1];


if(!$isMobile){
    //PC用ヘッダ
    include dirname( __FILE__).'/header/pc.php';
}else{
    //スマートフォン用ヘッダ
    include dirname( __FILE__).'/header/phone.php';
}

?>
