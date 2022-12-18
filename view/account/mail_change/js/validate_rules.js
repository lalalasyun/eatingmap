$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            mail: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i,
                remote:'https://app.eatingmap.fun/api/check_mail.php'
            }
        },
        //エラーメッセージの設定
        messages: {
            mail: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません',
                remote:'このメールアドレスは既に登録されています'
            }
        }
    });
});