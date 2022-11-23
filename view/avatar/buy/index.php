<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="/web/libs/css/bootstrap/bootstrap.min.css">
    <script src="/web/libs/js/bootstrap/bootstrap.min.js"></script>
    <script src="/web/libs/js/jquery/jquery-3.6.0.min.js"></script>
    <script src="js/index.js"></script>
    <title>メイン画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname(__FILE__, 3) . "/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>
    <div class="px-5">
        <div class="mt-3">
            <div class="flex">
                <img src="/web/view/images/user_icon/hiphop.png" alt="unpai" width="200" height="200" />
                <h1>ポイント残高</h1>
            </div>
        </div>
        <div class="box1 border border-dark p-5" style="height: 400px;">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>アバター選択</h2>
                </div>


            </div>

        </div>
        <div class="d-flex justify-content-end">

        
        <button type="button" class= "btn btn-danger" onclick="confirm_test()">購入</button>
</div>
    </div>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname(__FILE__, 3) . "/template/footer.php" ?>
    </footer>
</body>

</html>