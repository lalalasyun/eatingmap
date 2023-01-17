<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">

    <div class="w-100 m-3">
        <div>
            <div class="d-flex justify-content-center mb-5">
                <h1 class="mozi user-select-none">my page</h1>
            </div>

            <div>
                <?php if (!$isMobile) { ?>
                    <div class="d-flex justify-content-around">
                    <?php } else { ?>
                        <div class="d-flex justify-content-between">
                        <?php } ?>
                        <div class="mb-5">
                            <div class="d-flex mb-0">
                                <a class="user_icon" href="/user/<?= $USER_DATA['account'] ?>" title="プロフィールページ">
                                    <iframe src="/icon/<?= $USER_DATA['account'] ?>" width="100px" height="100px" loading="lazy" style="pointer-events: none;" title="アイコン"></iframe>
                                </a>
                                <div>
                                    <div class="d-flex px-3 pt-3 pb-1">
                                        <div id="user_name" class="py-0">
                                            <?= $USER_DATA['name'] ?>
                                        </div>
                                        <div class="px-2 py-0">
                                            さん
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end pt-4">
                                        <div class="d-flex cap" data-tippy-content="レビューを登録するとポイントが貰えます。">
                                            <div class="p-3 py-0 pe-0">ポイント残高</div>
                                            <div class="p-3 py-0 px-1">:</div>
                                            <div class="p-3 py-0 px-0" id="user_point"><?= $USER_DATA['point'] ?></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-0 p-0">
                                <a href="/view/avatar/change/" class="px-2 change-avatar" title="アバターを変更">
                                    アバター変更
                                </a>
                            </div>

                        </div>
                        <?php if (!$isMobile) { ?>
                            <div class="d-flex pt-3 align-items-center">
                                <a href='/view/account/setting/index.php'>
                                    <div class="btn-setting">アカウント設定</div>
                                </a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">

                    </div>
            </div>

            <div>
                <div class="button_line001 d-flex justify-content-around py-3">
                    <a href="/view/account/favorite/index.php" class="button_line001" style="width:160px;height:50px">お気に入り</a>
                    <a href="/view/account/review/index.php" class="button_line001" style="width:160px;height:50px">レビュー履歴</a>

                </div>

                <div class="button_line001 d-flex justify-content-around py-3">
                    <a href="/view/avatar/buy/index.php" class="button_line001" style="width:160px;height:50px">アバター購入</a>
                    <a href="/view/profile/edit/" class="button_line001 " style="width:160px;height: 50px">プロフィール編集</a>

                </div>
            </div>
        </div>
    </div>