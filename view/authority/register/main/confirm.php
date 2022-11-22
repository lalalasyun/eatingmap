<form action="" method="get">
    <button class="btn btn-primary" type="submit" name="submit" value="confirm">確認 </button>
</form>
<?php
if (isset($_GET['confirm'])) {

    //名前 フィルタリング 30文字以内
    if (isset($_GET['name']) && $_GET['name'] != '') {
        $cln['name'] = $_GET['name'];
    }
}
?>