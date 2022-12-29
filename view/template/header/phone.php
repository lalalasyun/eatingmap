<link rel="stylesheet" href="/view/template/header/css/style.css" />
<div class="d-flex justify-content-between">
    <div id="navArea">
        <nav>
            <div class="inner">
                <?php if ($this_page != 'mail' && $this_page != 'register' && $this_page != "login") { ?>
                    <?php if (!$_SESSION['auth']) { ?>
                        <!--新規登録-->
                        <button type="button" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='/view/authority/mail_certification/'">新規登録</button>
                        <!--ログイン-->
                        <button type="button" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='/view/authority/login/'">ログイン</button>
                    <?php } else { ?>
                        <button type="button" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='/user/<?= $USER_DATA['id'] ?>'">プロフィール画面</button>
                        <!--MyPage-->
                        <button type="button" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='/view/account/mypage/'">MyPage</button>
                        <button type="button" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='/view/account/setting/index.php'">アカウント設定</button>
                        <!--ログアウト-->
                        <button type="submit" class="btn btn-primary btn-sm w-100 my-1" onclick="location.href='?logout=1'">ログアウト</button>

                    <?php } ?>
                <?php } ?>
            </div>
        </nav>

        <div class="toggle-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div id="mask"></div>
    </div>

    <div class="header_img my-2" style="width:auto;height:50px;cursor:pointer;">
        <a href="/view/main/home/"><img src="/images/header/header_icon.png" class="w-100 h-100" alt="header_icon"></a>
    </div>
    <div style="width:100px;">

    </div>
</div>

<hr class="m-0">

<script src="/view/template/header/js/script.js"></script>