<?php 
if(!$isMobile){
    //PC用ヘッダ
    include dirname( __FILE__).'/footer/pc.php';
}else{
    //スマートフォン用ヘッダ
    include dirname( __FILE__).'/footer/phone.php';
}

?>
