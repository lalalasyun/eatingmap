<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="d-flex mb-5">
            <div class="user_icon" style="width:100px; height:100px; background:black;">

            </div>
            <div class="d-flex p-3">
                <div id="user_name">
                    ユーザネーム
                </div>
                <div class="px-2">
                    さん
                </div>
            </div>

        </div>
        <div class="mb-5">
            <div class="input-group mb-3 d-flex">
                <input type="text" class="form-control-lg w-75" placeholder="店名を入力">
                <button class="btn btn-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
            </div>
            <div class="d-flex justify-content-between w-75">
                <div class="d-flex">
                    <div class="search_prefectures">
                        <select id="select-pref" class="form-select form-select w-100">
                            <option value="">都道府県</option>
                        </select>
                    </div>
                    <div class="search_municipalities mx-1">
                        <select id="select-city" class="form-select form-select w-100">
                            <option value="">市区町村</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mb-5">
            <div class="search_distance mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/distance/'">距離検索</button>
            </div>
            <div class="search_genre mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/genre/'">ジャンルで検索</button>
            </div>
        </div>
        <div class="mt-5">
            <ul class="slider">
                <li><img src="/web/images/shop_image/ピザ.jpg"></li>
                <li><img src="/web/images/shop_image/ハンバーグ.jpg"></li>
                <li><img src="/web/images/shop_image/ボンゴレ.jpg"></li>
                <li><img src="/web/images/shop_image/ヒカル.jpg"></li>
                <li><img src="/web/images/shop_image/寿司.jpg"></li>
                <li><img src="/web/images/shop_image/そば.jpg"></li>
                <li><img src="/web/images/shop_image/クレープ.jpg"></li>
                <li><img src="/web/images/shop_image/サンドウィッチ.jpg"></li>
            </ul>
        </div>
    </div>
</div>