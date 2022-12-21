<div class="d-flex justify-content-center">

    <div class="d-flex justify-content-between w-75">
        <div class="header_img my-2" style="width:400px;cursor:pointer;" title="トップページへ">
            <img src="/images/header/header_icon.png" height="75px" onclick="location.href='/view/main/home/'">
        </div>
        <div class="d-flex align-items-end ">
            <?php if ($page != 'mail') { ?>
                <?php if (!$_SESSION['auth']) { ?>
                    <?php if (!($page == "register")) { ?>
                        <!--新規登録-->
                        <div class="me-3 mb-2">
                            <button type="button" class="btn btn-primary" onclick="location.href='/view/authority/mail_certification'" style="width:100px;">新規登録</button>
                        <?php } ?>
                        </div>

                        <?php if (!($page == "login")) { ?>
                            <!--ログイン-->
                            <div class="mb-2">
                                <button type="button" class="btn btn-primary" onclick="location.href='/view/authority/login'" style="width:100px;">ログイン</button>
                            </div>
                            
                        <?php } ?>
                    <?php } else { ?>
                        <!--ログアウト-->
                        <div class="headerbtn me-3 mb-2">
                            <a type="submit"onclick="location.href='?logout=1'">ログアウト</a>
                        </div>
                        <div class="headerbtn mb-2">
                            <!--MyPage-->
                            <a type="button"  onclick="location.href='/view/account/mypage'">MyPage</a>
                        </div>

                    <?php } ?>
                <?php } ?>
        </div>
    </div>
</div>
<hr class="m-0">