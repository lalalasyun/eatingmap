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
                        <div class="headerbtn2 me-3 mb-2"onclick="location.href='/view/authority/mail_certification'">
                            <a >新規登録<i class="fa-solid fa-user-pen ms-3"></i></a>
                        <?php } ?>
                        </div>

                        <?php if (!($page == "login")) { ?>
                            <!--ログイン-->
                            <div class="headerbtn2 mb-2"onclick="location.href='/view/authority/login'">
                                <a >ログイン<i class="fa-solid fa-right-to-bracket ms-3"></i></a>
                            </div>

                        <?php } ?>
                    <?php } else { ?>
                        <!--ログアウト-->
                        <div class="headerbtn1 me-3 mb-2"onclick="location.href='?logout=1'">
                            <a type="submit" >ログアウト<i class="fa-solid fa-right-to-bracket ms-3"></i></a>
                        </div>
                        <div class="headerbtn1 mb-2"onclick="location.href='/view/account/mypage'">
                            <!--MyPage-->
                             <a >MyPage<i class="fa-solid fa-user-gear ms-3"></i></a>
                        </div>

                    <?php } ?>
                <?php } ?>
        </div>
    </div>
</div>
<hr class="m-0">