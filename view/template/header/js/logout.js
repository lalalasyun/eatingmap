$(function () {
    $(document).ready(function () {
        $("#logout").click(function () {
            window.location.href = `${window.location.href}?logout=1`;
        });
    });
})