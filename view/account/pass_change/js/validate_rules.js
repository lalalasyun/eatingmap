$(function () {
    let account = "";
    $(document).ready(function () {
        $.ajax({
            type: 'get',
            url: `${data_list.apiUrl}/user/${user_account_id}`,
        }).done(function (data) {
            account = data.data.account;
        })
    });
    $.validator.addMethod('new_pass', function (value, element) {
        if (value != $("#pass1").val()) {
            return true;
        }
        return false;
    });
    $.validator.addMethod('check_pass', async function (value, element) {
        let json = { "account": account, "password": value };
        let res = await sampleResolve();
        return res;
        function sampleResolve() {
            return new Promise(resolve => {
                $.ajax({
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    async: false,
                    type: 'POST',
                    url: `${data_list.apiUrl}/user/login`,
                    data: JSON.stringify(json),
                }).done(function (data) {
                    if (data.code) {
                        resolve(true);
                    }
                    resolve(false);
                })
            })
        }


    });

    $('#input_area').validate({
        //ルールの設定
        rules: {
            pass1: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                remote: {
                    url: `${data_list.apiUrl}/api/check_pass.php`,
                    type: "get",
                    data: {
                        account: function() {
                            return account;
                          },
                        password:function() {
                            return $("#pass1").val();
                          }
                    }
                }
            },
            pass2: {
                required: true,
                pattern: /^(?=.*?[a-z])(?=.*?\d)[a-z\d]{0,20}$/i,
                minlength: 8,
                maxlength: 20,
                new_pass: true
            },
            pass3: {
                required: true,
                equalTo: "#pass2",
                new_pass: true
            },
        },
        //エラーメッセージの設定
        messages: {
            pass1: {
                required: 'これは必須項目です！',
                pattern: 'パスワードは半角英数字を含んで下さい',
                remote: '現在のパスワードを入力してください'
            },
            pass2: {
                required: 'これは必須項目です！',
                pattern: 'パスワードは半角英数字を含んで下さい',
                minlength: 'パスワードは8文字以上で入力してください',
                maxlength: 'パスワードは20文字以下で入力してください',
                new_pass: '違うパスワードを入力してください'
            },
            pass3: {
                required: 'これは必須項目です！',
                equalTo: 'パスワードが間違っています',
                new_pass: '違うパスワードを入力してください'
            },
        }
    });
});