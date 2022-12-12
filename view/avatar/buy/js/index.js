let buy_point = 0;
$(function () {
    $('.radio').click(function () {
        if ($(this).prop('checked')) {
            if((point - buy_point) - $(this).data().point < 0){
                alert('ポイントが足りません');
                $(this).prop('checked', false);
            }else{
                buy_point += $(this).data().point;
            }
        } else {
            buy_point -= $(this).data().point;
        }
        $('#point').html(point - buy_point);
        if(buy_point > 0){
            $('#submit_btn').prop('disabled', false);
        }else{
            $('#submit_btn').prop('disabled', true);
        }
    });
});