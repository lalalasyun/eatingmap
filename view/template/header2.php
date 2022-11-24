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
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-between w-75">
            <div class="header_img my-2" style="width:400px;cursor:pointer;">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
            </div>
            <div class="d-flex align-items-end">
                <form action="" method="post">
                    <!--ログアウト、MyPage-->
                    <button type="submit" class="btn btn-primary" name="logout" value="logout_click" style="width:90px;height: 38px;">ログアウト</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
                </form>
            </div>
        </div>
    </div>

    <hr class="m-0">
<?php } else { ?>
    <!--スマートフォン用ヘッダ-->
    <div class="d-flex justify-content-between">
        <div class="header_img my-2" style="width:400px;cursor:pointer;">
            <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'" class="w-100 h-100">
        </div>
        <div class="d-flex align-items-end">
            <form action="" method="post">
                <!--ログアウト、MyPage-->
                <button type="submit" class="btn btn-primary" name="logout" value="logout_click" style="width:90px;height: 38px;">ログアウト</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
            </form>
        </div>
    </div>

    <hr class="m-0">
<?php } ?>