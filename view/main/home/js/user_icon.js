$(function () {
if (user_account_id) {
    $(".user_icon ").click(function() {
        window.location.href = `/user/${user_account_id}`;
    });
    $('.user_icon').hover(
        function() {
            $(this).css('cursor', 'pointer');
        },
        function() {
            $(this).css('cursor', 'none');
        }
    );
}
});