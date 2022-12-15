<?php
if (isset($_GET['id'])) {
    $dbh = con();
    delete_shop_review($dbh, $_SESSION['account'], $_GET['id']);
    header("Location: /view/account/review/");
    exit;
}



?>
<div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                echo "w-75 my-4";
                                                                            } ?>">
    <div class="w-100 m-3 main">

        <div class="d-flex justify-content-center">
            <h1>履歴</h1>
        </div>
        <div class="container py-2 border rounded main_area" style="display: none;">

            <div id="review_list" class="w-100 m-0">

            </div>
        </div>

        <div class="d-flex justify-content-center w-100 m-3">
            <div class="me-5">
                <input type="button" class="btn btn-primary btn-lg" id="prev_btn" name="prev_page" value="前へ">
            </div>
            <div class="ms-5">
                <input type="button" class="btn btn-success btn-lg" id="next_btn" name="next_page" value="次へ">
            </div>
        </div>

    </div>
</div>