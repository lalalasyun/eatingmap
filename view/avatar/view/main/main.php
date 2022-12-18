<?php
if (isset($USERPAGE_DATA['id'])) {
    $user = $USERPAGE_DATA['id'];
    $dbh = con();

    $HEAD_ID =  get_genre_item_id($dbh, "head");
    $CLOTHE_ID =  get_genre_item_id($dbh, "clothes");
    $BACK_ID =  get_genre_item_id($dbh, "background");

    $res = get_avatar($dbh, $user, $HEAD_ID);
    $HEAD = null;
    $CLOTHE = null;
    $BACK = null;
    
    if ($res) {
        $HEAD = $res["image"];
    }
    $res = get_avatar($dbh, $user, $CLOTHE_ID);
    if ($res) {
        $CLOTHE = $res["image"];
    }
    $res = get_avatar($dbh, $user, $BACK_ID);
    if ($res) {
        $BACK = $res["image"];
    }

    $HEAD_PATH = "/images/avatar/headimg/";
    $CLOTHE_PATH = "/images/avatar/clotheimg/";
    $BACK_PATH = "/images/avatar/backimg/";
}


?>
<div class="icon_area">
    <div class="user_icon2">
        <img src="/images/user_icon/user_init_icon.png" width="100px" height="100px">
    </div>
    <?php if (isset($USERPAGE_DATA['id'])) { ?>
        <?php if ($HEAD) { ?>
            <div class="user_icon3">
                <img src="<?= $HEAD_PATH . $HEAD ?>" width="100px" height="100px">
            </div>
        <?php } ?>
        <?php if ($CLOTHE) { ?>
            <div class="user_icon4">
                <img src="<?= $CLOTHE_PATH . $CLOTHE ?>" width="100px" height="100px">
            </div>
        <?php } ?>
        <?php if ($BACK) { ?>
            <div class="user_icon1">
                <img src="<?= $BACK_PATH . $BACK ?>" width="100px" height="100px">
            </div>
        <?php } ?>
    <?php } ?>
</div>