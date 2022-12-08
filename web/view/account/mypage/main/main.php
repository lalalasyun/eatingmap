<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div>
            <div class="d-flex justify-content-center mb-5">
                <h1>MYページ</h1>
            </div>

            <div>
                <div class="d-flex justify-content-around">
                    <div class="mb-5">
                        <div class="d-flex mb-0">
                            <div class="user_icon" style="width:100px; height:100px; background:black;">

                            </div>
                            <div>
                                <div class="d-flex px-3 pt-3 pb-1">
                                    <div id="user_name"class="py-0">
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
                            <a href="/web/view/avatar/change/" style="text-decoration: none;">
                                <p class="px-2">アバター変更</p>
                            </a>
                        </div>

                    </div>
                    <div class="d-flex pt-3 align-items-center">
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="location.href='/web/view/account/setting/index.php'">アカウント設定</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">

            </div>
        </div>

        <div>
            <div class="d-flex justify-content-around py-3">
                <button type="button" class="btn btn-primary" style="width:25%;height:20%" onclick="location.href='/web/view/account/favorite/index.php'">お気に入り</button>
                <button type="button" class="btn btn-primary" style="width:25%;height:20%" onclick="location.href='/web/view/account/review/index.php'">レビュー履歴</button>

            </div>

            <div class="d-flex justify-content-around py-3">
                <button type="button" class="btn btn-primary" style="width:25%;height:20%" onclick="location.href='/web/view/avatar/buy/index.php'">アバター購入</button>
                <button type="button" class="btn btn-primary " style="width:25%;height:20%" onclick="location.href='/web/view/profile/edit/'">プロフィール編集</button>

            </div>
        </div>
    </div>
</div>