<div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                echo "w-75 my-4";
                                                                            } ?>">
    <div class="w-100">
        <div class="d-flex justify-content-center m-3">
            <div class="user_icon">
                <iframe src="/icon/<?= $USER_DATA['account'] ?>"></iframe>
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
                        <input id="input_name" type="text" class="form-control" name="name" required value="<?= $USER_DATA['name'] ?>">
                    </div>

                    <div class="fs-4">
                        <label class="form-label">自己紹介</label>
                        <div class="cnt_area d-flex fs-5">
                            <div class="now_cnt">0</div>
                            <div>/500</div>
                        </div>
                        <textarea id='input_text' class="form-control" name="text"><?= $USER_DATA['profile'] ?></textarea>
                    </div>
                </form>
                <div class="d-flex justify-content-center m-4">
                    <div class="d-flex">
                        <button type="button" id="back_btn" class="btn_18 me-5" style="width:70px">戻る</button>
                        <button type="button" id="submit_btn" class="btn_18 ms-5" style="width:70px">変更</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>