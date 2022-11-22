<?php
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;
?>
<?php if (!$detect->isMobile()) { ?>
    <!--PC用ヘッダ-->
    <div>
        <div class="d-flex justify-content-between">
            <div class="header_img" style="width:400px">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
            </div>
            <div class="d-flex align-items-end">
                <form action="" method="post">
                    <!--新規登録-->
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/mail_certification/'" style="width:90px;">新規登録</button>
                    <!--ログイン-->
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/login/'" style="width:90px;">ログイン</button>
                </form>
            </div>
        </div>
        <hr class="m-0">
    </div>
<?php } else { ?>
    <!--スマートフォン用ヘッダ-->
    <div>
        <div class="d-flex justify-content-between">
            <div class="header_img" style="width:400px">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'" width="100%" height="100%">
            </div>
            <div class="d-flex align-items-center" style="width:100px">
                <form action="" method="post">
                    <!--新規登録-->
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/mail_certification/'" style="width:90px;">新規登録</button>
                    <!--ログイン-->
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/login/'" style="width:90px;">ログイン</button>
                </form>
            </div>
        </div>
        <hr class="m-0">
    </div>
<?php } ?>