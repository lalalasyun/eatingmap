<?php
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;


// $detect->isMobile() が true でない場合
if (!$detect->isMobile()) {
    // デバイスが PC の場合に以下を表示
    echo "デバイスは PC です。";
} else {
    echo "デバイスは スマートフォン です。";
}

?>
<div>
    <div class="d-flex justify-content-between">
        <div class="header_img" style="width:400px">
            <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'" width="100%" height="100%">
        </div>
        <div class="d-flex align-items-end">
            <!--メイン画面へ-->
            <button type="button" class="btn btn-primary" onclick="location.href='/web/view/main/home/'" style="width:90px;">トップへ</button>
        </div>
    </div>
    <hr style="margin:10px 0px 0px;">
</div>