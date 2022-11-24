<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';
} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }

    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'admin@test.com'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";

        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;

        // メール送信
        mb_send_mail($to, $subject, $message, $headers);

        // 完了メッセージ
        $complete_msg = '送信されました！';

        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>
<div class="container mt-3">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-5 text-center">お問い合わせ</h3>

            <?php if ($err_msg != '') : ?>
                <div class="alert alert-danger">
                    <?php echo $err_msg; ?>
                </div>
            <?php endif; ?>

            <?php if ($complete_msg != '') : ?>
                <div class="alert alert-success">
                    <?php echo $complete_msg; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post"id="input_area">
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="お名前" value="<?php echo $name; ?>">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="subject" placeholder="件名" value="<?php echo $subject; ?>">
                </div>


                <div class="mb-3">
                    <select class="form-select form-control" id="sample" onchange="viewChange();">
                        <option value="0" class="text-muted">項目を選択してください</option>
                        <option value="1">質問</option>
                        <option value="2">店舗・店員削除</option>
                        <option value="3">店舗・店員登録申請</option>
                        <option value="4">その他</option>
                    </select>
                </div>
                <div class="mb-4" id="Box1" style="display:none;">
                    <textarea class="form-control" name="message" rows="5" placeholder="質問"><?php echo $message; ?></textarea>
                </div>
                <div class="mb-4" id="Box2" style="display:none;">
                    <select class="form-select form-control">
                        <option value="td0" class="text-muted">店舗削除</option>
                        <option value="td1">店員削除</option>
                    </select>
                    <div class="d-flex justify-content-center mt-3 ">
                        <input type="text" class="form-control" name="tenponame" style="width:1000px;" placeholder="支店名を入力してください。">
                    </div>
                    <div class="d-flex justify-content-center mt-3 ">
                        <input type="text" class="form-control" name="teninid" style="width:1000px;" placeholder="店員IDを入力してください">
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="備考"><?php echo $message; ?></textarea>
                    </div>
                </div>
                <div class="mb-4" id="Box3" style="display:none;">
                    <select class="form-select form-control">
                        <option value="t0" class="text-muted">店舗登録</option>
                        <option value="t1">店員登録</option>
                    </select>
                    <div class="d-flex justify-content-center mt-3 ">
                        <input type="text" class="form-control" name="tenponame" style="width:1000px;" placeholder="店名を入力してください。">
                    </div>
                    <div class="d-flex justify-content-center mt-3 ">
                        <input type="text" class="form-control"  style="width:90%;" placeholder="店住所を入力してください。">
                        <input type="button"class="form-control" name="misefrom" style="width:15%;" value="確認"onclick="codefrom() " >
                    </div>
                    <div class="d-flex justify-content-center mt-3 ">
                        <input type="text" class="form-control" name="teninid" style="width:1000px;" placeholder="店員IDを入力してください">
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="備考"><?php echo $message; ?></textarea>
                    </div>
                </div>
                <div class="mb-4" id="Box4" style="display:none;">
                    <textarea class="form-control" name="message" rows="5" placeholder="要件を入力してください"><?php echo $message; ?></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success" >送信</button>
                </div>

            </form>
        </div>
</div>