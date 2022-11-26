<?php if (!$isMobile) { ?>
    <!--PC用ヘッダ-->
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-between w-75">
            <div class="header_img my-2" style="width:400px;cursor:pointer;">
                <img src="/web/images/header/header_icon.png" height="75px" onclick="location.href='/web/view/main/home/'">
            </div>
            <div class="d-flex align-items-end ">
                <!--新規登録-->
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/mail_certification/'" style="width:90px;">新規登録</button>
                <!--ログイン-->
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/login/'" style="width:90px;">ログイン</button>

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
        <div class="align-items-end" style="width:90px;">
            <!--新規登録-->
            <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/mail_certification/'" style="width:90px;">新規登録</button>
            <!--ログイン-->
            <button type="button" class="btn btn-primary" onclick="location.href='/web/view/authority/login/'" style="width:90px;">ログイン</button>
        </div>
    </div>

    <hr class="m-0">
<?php } ?>