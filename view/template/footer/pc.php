<head>
    <link rel="stylesheet" type="text/css" href="/view/template/footer/css/style.css" />
    <script src="/view/template/footer/js/check_scroll.js"></script>
</head>

<hr class="m-0">
<div class="d-flex justify-content-center">
    <div class="w-75">
        <?php //お問い合わせページでは表示しない　
        ?>
        <?php if (!(isset($page) && $page == "send")) { ?>
            <div class="d-flex justify-content-center">
                <a href="/view/contact/send/" class="inquiry">
                    お問い合わせ
                </a>
            </div>
        <?php } ?>
        <div class="d-flex justify-content-between">
            <div style="width:100px"></div>
            <div>
                <p>Copyright (C) 2022 eatingmap All Rights Reserved.</p>
            </div>
            <div style="width:100px"></div>
        </div>
        <div id="go_top_btn" style="display:none;">
            <div class="d-flex justify-content-center m-3">
                <a href="#" class="btn btn--circle btn--circle-c btn--shadow"><i class="fas fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
</div>