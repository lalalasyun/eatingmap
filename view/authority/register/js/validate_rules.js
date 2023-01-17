$(function () {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            mail: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i,
                remote: `${data_list.apiUrl}/api/check_mail.php`
            },
            id: {
                required: true,
                pattern: /^[a-z\d]{0,20}$/i,
                minlength: 8,
                maxlength: 20,
                remote: `${data_list.apiUrl}/api/check_id.php`
            },
            pass: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                minlength: 8,
                maxlength: 20
            },
            pass_confirm: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                minlength: 8,
                maxlength: 20,
                equalTo: "#password"
            },
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'ニックネームを入力してください。',
                minlength: 'ニックネームが正しくありません。',
                maxlength: 'ニックネームが正しくありません。'
            },
            mail: {
                required: 'メールアドレスを入力してください。',
                pattern: 'メールアドレスが正しくありません。',
                remote: 'このメールアドレスは既に登録されています。'
            },
            id: {
                required: 'ユーザIDを入力して下さい。',
                pattern: 'ユーザIDが正しくありません。',
                minlength: 'ユーザIDが正しくありません。',
                maxlength: 'ユーザIDが正しくありません。',
                remote: 'このIDは既に登録されています。'
            },
            pass: {
                required: 'パスワードを入力してください。',
                pattern: 'パスワードが正しくありません。',
                minlength: 'パスワードが正しくありません。',
                maxlength: 'パスワードが正しくありません。'
            },
            pass_confirm: {
                required: 'パスワードが正しくありません。',
                pattern: 'パスワードが正しくありません。',
                minlength: 'パスワードが正しくありません。',
                maxlength: 'パスワードが正しくありません。',
                equalTo: 'パスワードが間違っています。'
            },
        }
    });
});