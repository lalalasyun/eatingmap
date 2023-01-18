<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-between w-75">
        <div class="header_img my-2" style="width:400px;cursor:pointer;" title="トップページへ">
            <a href="/view/main/home/"><img src="/images/header/header_icon.png" height="75px" alt="header_icon"></a>
        </div>
        <div class="d-flex align-items-end ">
            <?php if ($this_page != 'mail' && $this_page != 'register' && $this_page != "login") { ?>
                <?php if (!$_SESSION['auth']) { ?>
                    <!--新規登録-->
                    <div class="header_btn me-3 mb-2 btn">
                        <a href='/view/authority/mail_certification'>新規登録<i class="fa-solid fa-user-pen ms-3"></i></a>

                    </div>
                    <!--ログイン-->
                    <div class="header_btn mb-2 btn">
                        <a href='/view/authority/login<?= isset($is_logged_in)?"?is_logged_in=true":""?>'>ログイン<i class="fa-solid fa-right-to-bracket ms-3"></i></a>
                    </div>
                <?php } else { ?>
                    <!--ログアウト-->
                    <div class="header_btn me-3 mb-2 btn">
                        <a href='?logout=1'>ログアウト<i class="fa-solid fa-right-to-bracket ms-3"></i></a>
                    </div>
                    <div class="header_btn mb-2 btn">
                        <!--MyPage-->
                        <a href='/view/account/mypage'>MyPage<i class="fa-solid fa-user-gear ms-3"></i></a>
                    </div>

                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<hr class="m-0">