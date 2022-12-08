<?php
$name = "ナイビ";
$email = "aiueo@gmail.com";


?>
<div class="container mt-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">アカウント設定</h3>

        <form action="" method="post" id="input_area">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="ユーザー名" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="メールアドレス" value="<?php echo $email; ?>">
            </div>
            <div class="mb-4" id="Box1">
                <input type="password" class="form-control" name="pass1" rows="5" placeholder="現在のパスワード">
            </div>
            <div class="text-end">
                <button type="submit" style="width:25%;height:10%;" class="btn btn-success"id="change"onclick="pass_change()">パスワード変更</button>
            </div>
            <div class="mb-4" id="hid"style="display : none">
                <input type="password" class="form-control" name="pass2" rows="5" placeholder="新しいパスワード">
            </div>
            <div class="mb-4" id="hid2"style="display : none">
                <input type="password" class="form-control" name="pass3" rows="5" placeholder="新しいパスワード(再入力)">
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-primary" value="変更を適用">
            </div>
            
        </form>
    </div>
</div>