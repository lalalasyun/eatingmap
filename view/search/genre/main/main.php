
<head>
    <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist//web/libs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="市区町村読み込み/load_city.js"></script>
</head>
<header>
    <?php include "header.php" ?>
</header>
<div class="user_icon">
    <!--初期アイコン-->
    <img class="text_img" src="images/user_icon/user_init_icon.png"
        style="width:100px; height:auto;margin-top:10px; margin-left:10vh">
</div>
<form>
    <div>
        <div class="box container p-5 ">
            <select>
                <option value="">ジャンルを選択</option>
                <option value="0">寿司</option>
                <option value="1">そば・うどん</option>
                <option value="2">ラーメン</option>
                <option value="3">イタリアン</option>
                <option value="4">焼肉</option>
                <option value="5">居酒屋</option>
                <option value="6">カフェ</option>
                <option value="7">スイーツ</option>
            </select>

            <div class="container p-5 border rounded" style="margin:auto; height: 600px;">
                <ul class="list-group list-group-horizontal">
                    
                    <li class="list-group-item">
                        <div class="m-1">    
                                店名
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            評価
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            情報
                        </div>
                    </li>
                </ul>
                 <div class="container p-5 border rounded" style="margin:auto; height: 100px;">
                 
                 </div>
                <hr>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">
                        <div class="m-1">
                            店名
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            評価
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            情報
                        </div>
                    </li>
                </ul>
                <div class="container p-5 border rounded" style="margin:auto; height: 100px;">
                 </div>
                 <hr>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">
                        <div class="m-1">
                            店名
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            評価
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="m-1">
                            情報
                        </div>
                    </li>
                </ul>
                <div class="container p-5 border rounded" style="margin:auto; height: 100px;">
                 </div>
            </div>
            <div class="box1 d-flex justify-content-start mt-2">
                <div class="">
                    <select id="select-pref">
                        <option value="">都道府県を選択してください</option>
                    </select>
                </div>
                <div class="ms-3">
                    <select id="select-city">
                        <option value="">市区町村を選択してください</option>
                    </select>
                </div>
                <div class="ms-3">
                    価格<input type="text" name="price">
                </div>
                <div class="ms-5">
                    <input type="button" class="btn btn-primary" name="search" value="検索">
                </div>
            </div>

        </div>
    </div>
</form>