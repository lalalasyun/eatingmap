$(function () {

    $(document).ready(function () {
        if (!user_account_id) {
            $('#user_name').val("guest");
        } else {
            $('#user_name').attr('readonly',true);
            $('#add_emp').removeClass("d-none");
            $('#del_emp').removeClass("d-none");
            if (shop_id) {
                $('#add_emp').addClass("d-none");
            }else{
                $('#del_emp').addClass("d-none");
            }
        }
    });
})