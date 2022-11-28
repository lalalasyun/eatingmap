$(function() {
    $("#logout").click(function() {
        window.sessionStorage.setItem(['user_account_id'], []);
        window.location.href = `.?logout=1`;
    });
})