$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                minlength:2,
                maxlength:20
            },
            text: {
                maxlength:500
            }
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
                minlength: 'ニックネームは2文字以上で入力してください',
                maxlength:'ニックネームは20文字以下で入力してください'
            },
            text: {
                maxlength:'プロフィールは500文字以下で入力してください'
            }
        }
    });
});
function previewFile(hoge){
  var fileData = new FileReader();
  fileData.onload = (function() {
    //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
    //プレビュー表示している
    document.getElementById('preview').src = fileData.result;
  });
  fileData.readAsDataURL(hoge.files[0]);
}
