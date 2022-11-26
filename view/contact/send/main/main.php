<?php
if (isset($_POST['name'])) {
    $req =  $_POST['select1'];
    $del =  $_POST['select2'];
    $add =  $_POST['select3'];
    $data = null;
    if ($req == "question") {
        $data = array(
            "request" => "question",
            "account" => $_POST['name'],
            "text" =>  $_POST['question'],
        );
    }
    if ($req == "del" && $del == "shop") {
        $data = array(
            "request" => "del_shop",
            "account" => $_POST['name'],
            "shop_name" =>  $_POST['shop_name'],
            "text" => $_POST['note'],
        );
    }
    if ($req == "del" && $del == "emp") {
        $data = array(
            "request" => "del_emp",
            "account" => $_POST['name'],
            "shop_name" =>  $_POST['shop_name'],
            "text" => $_POST['note'],
        );
    }
    if ($req == "add" && $add == "shop") {
        $data = array(
            "request" => "add_shop",
            "account" => $_POST['name'],
            "shop_name" =>  $_POST['shop_name'],
            "address" => $_POST['shop_address'],
            "text" => $_POST['note'],
        );
    }
    if ($req == "add" && $add == "emp") {
        $data = array(
            "request" => "add_emp",
            "account" => $_POST['name'],
            "shop_name" =>  $_POST['shop_name'],
            "phone" => $_POST['phone'],
            "text" => $_POST['note'],
        );
    }
    if ($req == "other") {
        $data = array(
            "request" => "other",
            "account" => $_POST['name'],
            "text" => $_POST['message'],
        );
    }
    $json = json_encode($data);
}
?>
<script>
    let json = null;
    <?php if($json){ echo "json = ".$json;} ?>;
</script>
<div class="container mt-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">お問い合わせ</h3>

        <form action="" method="post" id="input_area">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="user_name" placeholder="お名前" value="<?php echo $name; ?>">
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


            <div class="mb-4 box" id="del">

                <select class="form-select form-control" id="select_del" name="select2" onchange="del_viewChange();">
                    <option value="" class="text-muted">項目を選択してください</option>
                    <option value="shop">店舗削除</option>
                    <option value="emp" class="d-none" id="del_emp">店員削除</option>
                </select>
            </div>

            <div class="mb-4 box" id="add">
                <select class="form-select form-control" name="select3" id="select_add" onchange="add_viewChange();">
                    <option value="" class="text-muted">項目を選択してください</option>
                    <option value="shop">店舗登録</option>
                    <option value="emp">店員登録</option>
                </select>
            </div>


            <div class="mt-3 box" id="shop_name">
                <input type="text" class="form-control w-100" name="shop_name" id="i_shop_name" placeholder="店名を入力してください。">
            </div>

            <div class="mt-3 box" id="phone">
                <input type="text" class="form-control w-100" name="phone" id="i_phone" placeholder="電話番号を入力してください。">
            </div>

            <div class="mt-3 box none" id="shop_address">
                <input type="text" class="form-control" name="shop_address" id="i_address" style="width:85%;" placeholder="店住所を入力してください。">
                <input type="button" class="form-control" style="width:15%;" value="確認" id="confirm">
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