<?php
$dbh = con();
echo '<script>let page_user_id = "' . $USERPAGE_DATA['id'] . '";</script>';
echo '<script>let page_user_account = "' . $USERPAGE_DATA['account'] . '";</script>';
$review_count = get_userid_review_count($dbh, $USERPAGE_DATA['id']);


?>
<div style="background-image:url(/images/background/obentou_frame.jpg)">
    <div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                    echo "w-75 my-4";
                                                                                } ?>" style="background-color:white">

        <div class="w-100 m-3">

            <div class="u1 user_icon" style="background-image:url(/images/background/b.jpg)">


                <iframe src="/icon/<?= $USERPAGE_DATA["account"] ?>" width="200px" height="200px" loading="lazy"></iframe>

            </div>
                                                             
            <hr size="10">
            <div class="d-flex">
                <div class="username"><?= $USERPAGE_DATA["name"] ?></div>
                <div class="username">@</div>
                <div class="username"><?= $USERPAGE_DATA['account'] ?></div>
            </div>


            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div class="h5">
                        レビュー数：<?= $review_count ?>件
                    </div>
                </div>
            </div>

            <div class="self-introduction w-100">
                <?php
                echo str_replace(PHP_EOL, '<br>', $USERPAGE_DATA["profile"]);
                ?>
            </div>
            <?php
            if ($_SESSION['auth'] && $USERPAGE_DATA['id'] == $_SESSION['account']) {
                include 'edit_btn.php';
            }
            ?>
            <div class="my-3">
                <div id="review_list" class="w-100 m-0">

                </div>

                <div class="d-flex justify-content-center w-100 my-3">
                    <ul class="style_pages p-0"></ul>
                </div>

            </div>
        </div>

    </div>
</div>