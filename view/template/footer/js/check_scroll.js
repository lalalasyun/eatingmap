$(document).ready(function () {
  $(window).scroll(function () {
    if($(this).scrollTop() < 20){
      $("#go_top_btn").hide();
    }else{
      $("#go_top_btn").show();
    }
  });
});