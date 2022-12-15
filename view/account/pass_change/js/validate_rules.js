$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            pass1: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i
            },
            pass2: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
            },
            pass3: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
                equalTo: "#pass2"
            },
        },
        //エラーメッセージの設定
        messages: {
            pass1: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません'
               
            },
            pass2: {
                required: 'これは必須項目です！',
                pattern: '違うパスワードを入力してください'
                
            },
            pass3: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません',
                equalTo: 'パスワードが間違っています'
            },
        }
    });
});