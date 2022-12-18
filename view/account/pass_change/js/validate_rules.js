$(function () {
    $.validator.addMethod('new_pass', function (value, element) {
        if (value != $("#pass1").val()) {
            return true;
        }
        return false;
    });
    $('#input_area').validate({
        //ルールの設定
        rules: {
            pass1: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i
            },
            pass2: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                minlength:8,
                maxlength:20,
                new_pass: true
            },
            pass3: {
                required: true,
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
                pattern: 'パスワードは半角英数字を含んで下さい',
                minlength: 'パスワードは8文字以上で入力してください',
                maxlength:'パスワードは20文字以下で入力してください',
                new_pass:'違うパスワードを入力してください'
            },
            pass3: {
                required: 'これは必須項目です！',
                equalTo: 'パスワードが間違っています'
            },
        }
    });
});