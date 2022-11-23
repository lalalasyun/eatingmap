<?php
$res = $_GET['logout'];

if ($res == 'logout_click') {
    $_SESSION['auth'] = false;
    $_SESSION['user_account_id'] = "";
    header("Location: /web/view/main/home");
    exit;
}
require_once dirname(__FILE__) . "/libs/Mobile_Detect.php";
$detect = new Mobile_Detect;

?>
<?php if (!$detect->isMobile()) { ?>
    <!--PC用ヘッダ-->
    <div class="d-flex justify-content-between">
        <div class="header_img" style="width:400px">
            <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
        </div>

        <div class="d-flex align-items-end">
            <form action="" method="get">
                <!--ログアウト、MyPage-->
                <button type="submit" class="btn btn-primary" name="logout" value="logout_click" style="width:90px;height: 38px;">ログアウト</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
            </form>

        </div>
    </div>
    <hr class="m-0">
<?php } else { ?>
    <!--スマートフォン用ヘッダ-->
    <div class="d-flex justify-content-center">
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
    <hr class="m-0">
<?php }?>