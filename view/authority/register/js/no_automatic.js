$(function () {
  $(document).ready(function () {
    $('#input_area').find('input').prop('readonly',true);

    setTimeout(function () {
      $('#input_area').find('input').prop('readonly',false);
    }, 100);
  });
});