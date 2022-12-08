<?php
if (isset($_GET['logout'])) {
    $_SESSION['auth'] = false;
    $_SESSION['user_account_id'] = "";
    header("Location: /web/view/main/home/");
    exit;
}
?>
<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-between w-75">
        <div class="header_img my-2" style="width:400px;cursor:pointer;" title="トップページへ">
            <img src="/web/images/header/header_icon.png" height="75px" onclick="location.href='/web/view/main/home/'">
        </div>
        <div class="d-flex align-items-end ">
            <?php if ($page != 'mail') { ?>
                <?php if (!$_SESSION['auth']) { ?>
                    <?php if (!($page == "register")) { ?>
                        <!--新規登録-->
                        <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/mail_certification'" style="width:100px;">新規登録</button>
                    <?php } ?>
                    <?php if (!($page == "login")) { ?>
                        <!--ログイン-->
                        <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/login'" style="width:100px;">ログイン</button>
                    <?php } ?>
                <?php } else { ?>
                    <!--ログアウト-->
                    <button type="submit" class="btn btn-primary" id="logout" style="width:90px;height: 38px;">ログアウト</button>
                    <!--MyPage-->
                    <button type="button" class="btn btn-primary" onclick="location.href='/web/view/account/mypage'" style="width:90px;height: 38px;">MyPage</button>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<hr class="m-0">
<script src="/web/libs/js/logout.js"></script>