<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<div class="user_icon">
    <!--初期アイコン-->
    <a href="/web//view//mypage/index.php">
    <img class="text_img" src="images/IMG_2934 (2)_1122014825 (1).png" style="width:100px; height:auto;margin-top:10px; margin-left:10vh">
    </a>
</div>

<div class="container my-5 p-5 border rounded" style="margin:auto;">

    <div class="d-flex justify-content-between">
        <div class="search_name">
            <form>
                <div class="mb-3">
                    <input type="search" class="form-control m-2" id="omise" placeholder="店舗名を入力してね！" style="margin-right: 20px;">
                </div>
                <div class="d-flex justify-content-between">
                        <select id="select-pref" class="form-select form-select-lg w-100" aria-label=".form-select-lg example">
                            <option value="">都道府県を選択してください</option>
                        </select>
                        <select id="select-city" class="form-select form-select-lg w-100" aria-label=".form-select-lg example">
                            <option value="">市区町村を選択してください</option>
                        </select>
                    </div>

            </form>
        </div>

        <div class="search_name_btn m-4 d-flex align-items-end">
            <button type="submit" class="btn btn-secondary" style="width: 10vh;">検索</button>
        </div>

        <div>
            <div class="search_distance m-3">
                <button class="btn btn-info" style="width: 20vh; height:45px;">距離検索</button>
            </div>
            <div class="search_genre m-3">
                <button class="btn btn-info" onclick="location.href='/web/view/search/genre/'" style="width: 20vh; height:45px;">ジャンルで検索</button>
            </div>
        </div>
    </div>
</div>
<div class="sample02" style="margin:0px;">
    <ul>

        <li><img src="images/d37526-57-560450-0.jpg" width="300"></li>
        <li><img src="images/ハンバーグ.jpg" width="300"></li>

        <li><img src="images/ボンゴレ.jpg" width="250"></li>

        <li><img src="images/ヒカル.jpg" width="300"></li>

        <li><img src="images/寿司.jpg" width="300"></li>

        <li><img src="images/そば.jpg" width="300"></li>
        <li><img src="images/クレープ.jpg" width="300"></li>
        <li><img src="images/サンドウィッチ.jpg" width="300"></li>
        <li><img src="images/A1B56EC0-8BE2-46AF-9E35-1F26F73A69F9.jpg" width="300"></li>

    </ul>

</div>