<hr>
<div class="d-flex justify-content-center">
    <div class="w-75">
        <?php //お問い合わせページでは表示しない　?>
        <?php if (!(isset($page) && $page == "send")) { ?>
            <div class="d-flex justify-content-center">
                <a href="/web/view/contact/send/" class="inquiry">
                    お問い合わせ
                </a>
                <style>
                    .inquiry {
                        font-weight: 700;
                        color: black;
                        text-decoration: none;
                    }

                    .inquiry:hover {
                        color: black;
                        text-decoration: underline;
                    }
                </style>
            </div>
        <?php } ?>
        <div class="d-flex justify-content-between">
            <div style="width:100px"></div>
            <div>
                <p>Copyright (C) 2022 ☆e-ting map☆ All Rights Reserved.</p>
            </div>
            <div style="width:100px"></div>
        </div>
        <?php if (!(isset($page) && $page == "lowpage")) { ?>
        <div class="d-flex justify-content-center">
              <p><a href="#" ><img src="/web/images/object_icon/top.jpg" style="height:100px; width:100px;"></a></p>
        </div>
        <?php } ?>
    </div>
</div>