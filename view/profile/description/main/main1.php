<?php
$dbh = con();
?>
<div class="d-flex flex-column bd-highlight mb-3 text-left p-4">
    <div class="mt-3">
        <form>
            <div class="sample-box">
                <img src="/images/user_icon/IMG_3574 (2).png" width="200" height="200">
                <div class="good">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>

                </div>
            </div>

            <HR SIZE="10">
            <div class="username"><?= $USER_DATA["name"] ?></div>

            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div class="h5">
                        レビュー数：<?= get_userid_review_count($dbh, $USER_DATA['id']) ?>
                    </div>
                </div>
            </div>

            <div class="self-introduction"><?= $USER_DATA["profile"] ?></div>
            <?php
            if ($_SESSION['auth'] && $USER_DATA['id'] == $_SESSION['account']) {
                include 'edit_btn.php';
            }
            ?>
        </form>

    </div>
</div>