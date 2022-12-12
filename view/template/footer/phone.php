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
        <div class="d-flex justify-content-center">
            <div>
                <p>Copyright (C) 2022 ☆e-ting map☆ All Rights Reserved.</p>
            </div>
        </div>
        <div class="fixed-bottom" id="go_top_btn" style="display:none;height:70px;">
            <div class="d-flex justify-content-end">
                <p><a href="#"><img src="/images/object_icon/top.jpg" style="height:70px; width:70px;"></a></p>
            </div>
        </div>
    </div>
</div>