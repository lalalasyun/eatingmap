<head>
    <script src="/view/template/header/js/logout.js"></script>
</head>

<div class="d-flex justify-content-between">
    <div class="header_img my-2" style="width:auto;height:50px;cursor:pointer;">
        <img src="/images/header/header_icon.png" onclick="location.href='/view/main/home/'" class="w-100 h-100">
    </div>
    <div style="width:100px;">
        <?php if ($page != 'mail') { ?>
            <?php if (!$_SESSION['auth']) { ?>
                <!--新規登録-->
                <button type="button" class="btn btn-primary btn-sm w-100" onclick="location.href='/view/authority/mail_certification/'">新規登録</button>
                <!--ログイン-->
                <button type="button" class="btn btn-primary btn-sm w-100" onclick="location.href='/view/authority/login/'">ログイン</button>
            <?php } else { ?>
                <!--ログアウト-->
                <button type="submit" class="btn btn-primary btn-sm w-100" id="logout">ログアウト</button>
                <!--MyPage-->
                <button type="button" class="btn btn-primary btn-sm w-100" onclick="location.href='/view/account/mypage/'">MyPage</button>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<hr class="m-0">