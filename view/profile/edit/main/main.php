<?php
$dbh = con();
$USER_DATA = get_userid_user($dbh, $_SESSION['account']);
if (isset($_POST['name']) && isset($_POST['text'])) {
    if ($USER_DATA['profile'] !== $_POST['text'] || $USER_DATA['name'] !== $_POST['name']) {
        set_user_prof($dbh, $_SESSION['account'], $_POST['name'], $_POST['text']);
        header("Location: /view/account/mypage/index.php");
        exit();
    }
    header("Location: /view/profile/edit/index.php");
    exit();
}
?>

<div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                echo "w-75 my-4";
                                                                            } ?>">


    <div class="w-100">
        <div class="d-flex justify-content-center m-3">
            <div class="user_icon">
                <iframe src="/icon/<?= $_SESSION['account'] ?>"></iframe>
                <style>
                    .user_icon iframe {
                        width: 300px;
                        height: 300px;
                        pointer-events: none;
                    }
                </style>
            </div>
        </div>

        <div class="d-flex justify-content-center m-3">
            <div class="<?php if (!$isMobile) {
                            echo "w-75";
                        } ?>">
                <form id="input_area" action="" method="post">

                    <div class="fs-4">
                        <label class="form-label">ニックネーム</label>
                        <input type="text" class="form-control" name="name" required value="<?= $USER_DATA['name'] ?>">
                    </div>

                    <div class="fs-4">
                        <label class="form-label">自己紹介</label>
                        <textarea class="form-control" name="text"><?= $USER_DATA['profile'] ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center m-4">
                        <div class="d-flex">
                            <button type="button" class="btn btn-dark me-5" style="width:70px" onClick="History_back()">戻る</button>
                            <input type="button" class="btn btn-primary ms-5" style="width:70px" value="変更">
                        </div>
                    </div>

                </form>
            </div>

        </div>


    </div>

</div>