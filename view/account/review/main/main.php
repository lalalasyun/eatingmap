<?php
if(isset($_GET['id'])){
    $dbh = con();
    delete_shop_review($dbh, $_SESSION['account'], $_GET['id']);
    header("Location: /view/account/review/");
    exit;
}



?>
<div class="d-flex justify-content-center">
    <h1>履歴</h1>
</div>
<div class="container py-2border rounded">

    <div id="review_list" class="w-100 m-0">

    </div>


    <div class="d-flex justify-content-end mt-3">

        <input type="button" class="btn btn-success" id="next_btn" name="next_page" value="次へ">
    </div>

</div>
</div>