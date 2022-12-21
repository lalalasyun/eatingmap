

<?php 
if(isset($_GET['logout']) && $_GET['logout'] == 1){
    $_SESSION['account'] = "";
    $_SESSION['auth'] = false;
    header("Location: /view/main/home/");
    exit;
}

if(!$isMobile){
    //PC用ヘッダ
    include dirname( __FILE__).'/header/pc.php';
}else{
    //スマートフォン用ヘッダ
    include dirname( __FILE__).'/header/phone.php';
}

?>
