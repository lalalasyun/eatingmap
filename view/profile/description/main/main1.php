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
            <form>

                <div class="u1 user_icon" style="background-image:url(/images/background/b.jpg)">


                    <iframe src="/icon/<?= $USERPAGE_DATA["id"] ?>"></iframe>

                    <style>
                        .user_icon iframe {
                            width: 200px;
                            height: 200px;
                            pointer-events: none;
                            border-radius: 50%;
                            background-position: left top;
                            display: inline-block;
                            border: 9px solid #00cc00;

                        }
                    </style>
                </div>


                <hr size="10">
                <div class="username"><?= $USERPAGE_DATA["name"] ?></div>

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <?php if (!$isMobile) { ?>
                            <div class="h5">
                                レビュー数：<?= $review_count ?>
                            </div>
                        <?php } else { ?>
                            <div class="h5">
                                <?= $review_count ?>件
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="self-introduction"><?= $USERPAGE_DATA["profile"] ?></div>
                <?php
                if ($_SESSION['auth'] && $USERPAGE_DATA['id'] == $_SESSION['account']) {
                    include 'edit_btn.php';
                }
                ?>
            </form>
            <div class="d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                    echo "w-75 my-4";
                                                                } ?>">
                <div class="w-100 m-3 main">

                    <div class="d-flex justify-content-center">
                        <h1>レビュー一覧</h1>
                    </div>
                    <div class="container py-2 border rounded">

                        <div id="review_list" class="w-100 m-0">

                        </div>
                    </div>

                    <div class="d-flex justify-content-center w-100 my-3">
                        <ul class="style_pages"></ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>