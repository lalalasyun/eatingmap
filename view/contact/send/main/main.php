<?php
$json = "";
if (isset($_POST['name'])) {
    $dbh = con();
    $req =  $_POST['select1'];
    $del =  $_POST['select2'];
    $add =  $_POST['select3'];
    $data = null;
    $user_id = "0";
    if(isset($USER_DATA['id'])){
        $user_id = $USER_DATA['id'];
    }
    if ($req == "question") {
        send_ask_form($dbh,$user_id,$_POST['name'],$_POST['question']);
    }
    if ($req == "del" && $del == "shop") {
        send_del_shop_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name']);
    }
    if ($req == "del" && $del == "emp") {
        send_del_emp_form($dbh,$user_id,$_POST['note'],$_POST['shop_id'],$_POST['shop_name'],$_POST['name']);
    }
    if ($req == "add" && $add == "shop") {
        send_add_shop_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name'],$_POST['shop_address']);
    }
    if ($req == "add" && $add == "emp") {
        send_add_emp_form($dbh,$user_id,$_POST['note'],$_POST['shop_name'],$_POST['name'],$_POST['phone']);
    }
    if ($req == "other") {
        send_other_form($dbh,$user_id,$_POST['name'],$_POST['message']);
    }

    header('Location: /view/contact/send');
}
?>
<script>
    let shop_id = null;
    <?php if (isset($USER_DATA['shop_id']) && $USER_DATA['shop_id']) { ?>
    shop_id = "<?= $USER_DATA['shop_id'] ?>";
    <?php } ?>
</script>
<div class="container my-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">お問い合わせ</h3>

        <form action="" method="post" id="input_area">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="user_name" placeholder="お名前">
            </div>

            <div class="mb-3">
                <select class="form-select form-control" name="select1" id="sample" onchange="viewChange();">
                    <option value="" class="text-muted">項目を選択してください</option>
                    <option value="question">質問</option>
                    <option value="del">削除申請</option>
                    <option value="add">登録申請</option>
                    <option value="other">その他</option>
                </select>
            </div>

            <div class="mb-4 box" id="question">
                <textarea class="form-control" name="question" id="i_question" placeholder="質問"></textarea>
            </div>

            <input type="hidden" name="shop_id" value="" id="shop_id">


            <div class="mb-4 box" id="del">

                <select class="form-select form-control" id="select_del" name="select2" onchange="del_viewChange();">
                    <option value="0" class="text-muted">項目を選択してください</option>
                    <option value="shop">店舗削除</option>
                    <option value="emp" class="d-none" id="del_emp">店員削除</option>
                </select>
            </div>

            <div class="mb-4 box" id="add">
                <select class="form-select form-control" name="select3" id="select_add" onchange="add_viewChange();">
                    <option value="0" class="text-muted">項目を選択してください</option>
                    <option value="shop">店舗登録</option>
                    <option value="emp" class="d-none" id="add_emp">店員登録</option>
                </select>
            </div>


            <div class="mt-3 box" id="shop_name">
                <input type="text" class="form-control w-100" name="shop_name" id="i_shop_name" placeholder="店名を入力してください。">
            </div>

            <div class="mt-3 box" id="phone">
                <input type="text" class="form-control w-100" name="phone" id="i_phone" placeholder="電話番号を入力してください。">
            </div>

            <div class="mt-3 box none" id="shop_address">
                <input type="text" class="form-control" name="shop_address" id="i_address" placeholder="店住所を入力してください。">

            </div>
            <div class="mt-3 mb-4 box" id="note">
                <textarea class="form-control" name="note" rows="5" id="i_note" placeholder="備考"></textarea>
            </div>

            <div class="mb-4 box" id="other">
                <textarea class="form-control" name="message" rows="5" id="i_other" placeholder="要件を入力してください"></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">送信</button>
            </div>

        </form>
    </div>
</div>