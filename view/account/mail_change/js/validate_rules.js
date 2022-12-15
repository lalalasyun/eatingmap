$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            email: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i
            }
        },
        //エラーメッセージの設定
        messages: {
            email: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません'
                
            }
        }
    });
});