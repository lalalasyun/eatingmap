
<?php
$user = $USERPAGE_DATA['id'];
$dbh = con();

$HEAD_ID =  get_genre_item_id($dbh, "head");
$CLOTHE_ID =  get_genre_item_id($dbh, "clothes");
$BACK_ID =  get_genre_item_id($dbh, "background");

$HEAD = get_avatar($dbh, $user, $HEAD_ID)["image"];
$CLOTHE = get_avatar($dbh, $user, $CLOTHE_ID)["image"];
$BACK = get_avatar($dbh, $user, $BACK_ID)["image"];

$HEAD_PATH = "/images/avatar/headimg/";
$CLOTHE_PATH = "/images/avatar/clotheimg/";
$BACK_PATH = "/images/avatar/backimg/";

?>
<div class="user_icon2">
    <img src="/images/user_icon/user_init_icon.png" width="100px" height="100px" >
</div>
<div class="user_icon3">
    <img src="<?= $HEAD_PATH.$HEAD ?>" width="100px" height="100px" >
</div>
<div class="user_icon4">
    <img src="<?= $CLOTHE_PATH .$CLOTHE?>" width="100px" height="100px" >
</div>
<div class="user_icon1">
    <img src="<?= $BACK_PATH.$BACK ?>" width="100px" height="100px" >
</div>