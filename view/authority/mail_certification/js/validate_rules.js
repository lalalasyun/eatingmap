$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
            },
            mail: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i
            },
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
            },
            mail: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません'
                
            },
        }
    });
});