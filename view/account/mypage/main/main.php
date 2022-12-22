<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div>
            <div class="d-flex justify-content-center mb-5">
                <h1 class="mozi">my page</h1>
            </div>

            <div>
                <?php if (!$isMobile) { ?>
                    <div class="d-flex justify-content-around">
                    <?php } else { ?>
                        <div class="d-flex justify-content-between">
                        <?php } ?>
                        <div class="mb-5">
                            <div class="d-flex mb-0">
                                <div class="user_icon">
                                    <iframe src="/icon/<?= $_SESSION['account'] ?>"></iframe>
                                    <script>
                                        $(".user_icon").click(function() {
                                            window.location.href = `/user/<?= $_SESSION['account'] ?>`;
                                        });
                                    </script>
                                    <style>
                                        .user_icon iframe {
                                            width: 100px;
                                            height: 100px;
                                            pointer-events: none;
                                        }
                                    </style>
                                </div>
                                <div>
                                    <div class="d-flex px-3 pt-3 pb-1">
                                        <div id="user_name" class="py-0">
                                            ユーザネーム
                                        </div>
                                        <div class="px-2 py-0">
                                            さん
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end pt-4">
                                        <div class="p-3 py-0 pe-0">ポイント残高</div>
                                        <div class="p-3 py-0 px-1">:</div>
                                        <div class="p-3 py-0 px-0" id="user_point">0</div>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-0 p-0">
                                <a href="/view/avatar/change/" style="text-decoration: none;">
                                    <p class="px-2">アバター変更</p>
                                </a>
                            </div>

                        </div>
                        <?php if (!$isMobile) { ?>
                            <div class="d-flex pt-3 align-items-center">
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="location.href='/view/account/setting/index.php'">アカウント設定</button>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">

                    </div>
            </div>

            <div>
                <div class="d-flex justify-content-around py-3">
                    <button type="button" class="btn btn-primary" style="width:150px;height:50px" onclick="location.href='/view/account/favorite/index.php'">お気に入り</button>
                    <button type="button" class="btn btn-primary" style="width:150px;height:50px" onclick="location.href='/view/account/review/index.php'">レビュー履歴</button>

                </div>

                <div class="d-flex justify-content-around py-3">
                    <button type="button" class="btn btn-primary" style="width:150px;height:50px" onclick="location.href='/view/avatar/buy/index.php'">アバター購入</button>
                    <button type="button" class="btn btn-primary " style="width:150px;height:50px" onclick="location.href='/view/profile/edit/'">プロフィール編集</button>

                </div>
            </div>
        </div>
    </div>