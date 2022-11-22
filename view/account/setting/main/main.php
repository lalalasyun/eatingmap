<div>
    <img class="text_img" src="images/user_icon/user_icon_sample.jpg" style="width:100px; height:100px; margin-top:10px; margin-left:10vh">
    ユーザーネーム
</div>
<div class="container mt-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">アカウント設定</h3>

        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="ユーザーID" value="<?php echo $name; ?>">
                <div class="text-end">
                    <button type="submit" class="btn btn-success">ID変更</button>
                </div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="subject" placeholder="メールアドレス" value="<?php echo $subject; ?>">
                <div class="text-end">
                    <button type="submit" class="btn btn-success">メールアドレス変更</button>
                </div>
            </div>
            <div class="mb-4" id="Box1">
                <input type="password" class="form-control" name="pass" rows="5" placeholder="現在のパスワード">

            </div>
            <div class="mb-4" id="Box1">
                <input type="password" class="form-control" name="pass" rows="5" placeholder="新しいパスワード">
            </div>
            <div class="mb-4" id="Box1">
                <input type="password" class="form-control" name="pass" rows="5" placeholder="新しいパスワード(再入力)">
                <div class="text-end">
                    <button type="submit" style="width:25%;height:10%;" class="btn btn-success">パスワード変更</button>
                </div>

            </div>



        </form>
    </div>
</div>