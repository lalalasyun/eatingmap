$(function () {
  $(document).ready(function () {
    //ブラウザの自動入力を強制的に削除
    setTimeout(function () {
      $('#input_area').find('input').each(function() {
        $(this).val("");
      })
    }, 100);
  });
});