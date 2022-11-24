<?php
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;
?>
<?php if (!$detect->isMobile()) { ?>
    <!--PC用ヘッダ-->
    <div>
        <div class="d-flex justify-content-between">
            <div class="header_img" style="width:400px;cursor:pointer;">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
            </div>
            <div class="d-flex align-items-end">
                <!--メイン画面へ-->
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/main/home/'" style="width:90px;">トップへ</button>
            </div>
        </div>
        <hr class="m-0">
    </div>
<?php } else { ?>
    <!--スマートフォン用ヘッダ-->
    <div>
        <div class="d-flex justify-content-center">
            <div class="header_img" style="width:400px">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'" width="100%" height="100%">
            </div>
            <div class="d-flex align-items-end">
                <!--メイン画面へ-->
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/main/home/'" style="width:90px;">トップへ</button>
            </div>
        </div>
        <hr class="m-0">
    </div>

<?php } ?>