$(function () {
  $(document).ready(function () {
    //ブラウザの自動入力を強制的に削除
    let cnt = 0
    const timerId = setInterval(() => {
      if (cnt++ === 50) { 
        clearInterval(timerId);
      }
      $('#input_area').find('input').each(function () {
        $(this).val("");
      })
    }, 10);
  });
});