<link rel="stylesheet" href="/view/template/header/css/style.css" />
<div class="d-flex justify-content-between">
    <div id="navArea">
        <nav>
            <div class="inner">
                <?php if ($this_page != 'mail' && $this_page != 'register' && $this_page != "login") { ?>
                    <?php if (!$_SESSION['auth']) { ?>
                        <!--新規登録-->
                        <a href="/view/authority/mail_certification/">
                            <button type="button" class="btn btn-primary btn-sm w-100 my-1">新規登録</button>
                        </a>
                        <!--ログイン-->
                        <?php if (isset($is_logged_in) && $is_logged_in) { ?>
                            <a href='/view/authority/login?is_logged_in=true'><button type="button" class="btn btn-primary btn-sm w-100 my-1">ログイン</button></a>
                        <?php } else { ?>
                            <a href='/view/authority/login'><button type="button" class="btn btn-primary btn-sm w-100 my-1">ログイン</button></a>
                        <?php } ?>
                    <?php } else { ?>
                        <a href="/user/<?= $USER_DATA['id'] ?>">
                            <button type="button" class="btn btn-primary btn-sm w-100 my-1">プロフィール画面</button>
                        </a>
                        <a href="/view/account/mypage/">
                            <button type="button" class="btn btn-primary btn-sm w-100 my-1">MyPage</button>
                        </a>
                        <!--MyPage-->
                        <a href="/view/account/setting/index.php">
                            <button type="button" class="btn btn-primary btn-sm w-100 my-1">アカウント設定</button>
                        </a>
                        <!--ログアウト-->
                        <a href="?logout=1">
                            <button type="submit" class="btn btn-primary btn-sm w-100 my-1">ログアウト</button>
                        </a>
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