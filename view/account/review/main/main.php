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
        <div id="review_list" class="w-100 m-0">

            </div>

        <div class="d-flex justify-content-center w-100 my-3">
            <ul class="style_pages"></ul>
        </div>

    </div>
</div>