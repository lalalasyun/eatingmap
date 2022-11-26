<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION['auth'] = false;
    $_SESSION['user_account_id'] = "";
    header("Location: /web/view/main/home");
    exit;
}

?>
<?php if (!$isMobile) { ?>
    <!--PC用ヘッダ-->
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-between w-75">
            <div class="header_img my-2" style="width:400px;cursor:pointer;">
                <img src="/web/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
            </div>
            <div class="d-flex align-items-end">
                <!--ログアウト、MyPage-->
                <button type="submit" class="btn btn-primary" id="logout" style="width:90px;height: 38px;">ログアウト</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
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
            <!--ログアウト、MyPage-->
            <button type="submit" class="btn btn-primary" id="logout" style="width:90px;height: 38px;">ログアウト</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="width:90px;height: 38px;">MyPage</button>
        </div>
    </div>

    <hr class="m-0">
<?php } ?>
<script type="text/javascript">
    $(function() {
        $("#logout").click(function() {
            window.sessionStorage.setItem(['user_account_id'], []);
            window.location.href = `.?logout=1`;
        });
    })
</script>