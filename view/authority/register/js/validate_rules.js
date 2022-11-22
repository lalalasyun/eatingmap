$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                pattern: /^[a-zA-Z0-9あ-ん\d]{4,8}$/i
            },
            mail: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i
            },
            id: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i
            },
            pass: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
            },
            pass_confirm: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
                equalTo: "#password"
            },
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
                pattern: 'ニックネームが正しくありません',
               
                
            },
            mail: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません'
                
            },
            id: {
                required: 'これは必須項目です！',
                pattern: 'IDが正しくありません'
            },
            pass: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません'
            },
            pass_confirm: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません',
                equalTo: 'パスワードが間違っています'
            },
        }
    });
});