$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                minlength:2,
                maxlength:20
            },
            mail: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i,
                remote:'https://app.eatingmap.fun/api/check_mail.php'
            },
            id: {
                required: true,
                pattern: /^[a-z\d]{0,20}$/i,
                minlength:8,
                maxlength:20,
                remote:'https://app.eatingmap.fun/api/check_id.php'
            },
            pass: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                minlength:8,
                maxlength:20
            },
            pass_confirm: {
                required: true,
                equalTo: "#password"
            },
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
                minlength: 'ニックネームは2文字以上で入力してください',
                maxlength:'ニックネームは20文字以下で入力してください'
            },
            mail: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません',
                remote:'このメールアドレスは既に登録されています'
            },
            id: {
                required: 'これは必須項目です！',
                pattern: 'IDは半角英数字で入力して下さい',
                minlength: 'IDは8文字以上で入力してください',
                maxlength:'IDは20文字以下で入力してください',
                remote:'このIDは既に登録されています'
            },
            pass: {
                required: 'これは必須項目です！',
                pattern: 'パスワードは半角英数字を含んで下さい',
                minlength: 'パスワードは8文字以上で入力してください',
                maxlength:'パスワードは20文字以下で入力してください'
            },
            pass_confirm: {
                required: 'これは必須項目です！',
                equalTo: 'パスワードが間違っています'
            },
        }
    });
});