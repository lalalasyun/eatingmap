<?php
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;


// $detect->isMobile() が true でない場合
if (!$detect->isMobile()) {
    // デバイスが PC の場合に以下を表示
    echo "デバイスは PC です。";
}
$res = $_GET['logout'];

if ($res == 'logout_click') {
    /* 仮　ログインチェック*/
    $_SESSION['logout'] = "1";
    header("Location: /web/view/main/home");
    exit;
}

?>
<div>
    <!--ログイン済みヘッダー-->
    <div class="d-flex justify-content-between">
        <div class="header_img" style="width:400px">
            <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'" width="100%" height="100%">
        </div>

        <div class="d-flex align-items-end">
            <form action="" method="get">
                <!--ログアウト、MyPage-->
                <button type="submit" class="btn btn-primary" name="logout" value="logout_click" style="width:90px;height: 38px;">ログアウト</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
            </form>

        </div>
    </div>
    <hr style="margin:10px 0px 0px;">
</div>