function viewChange() {
    if (document.getElementById('sample')) {
        $('#i_shop_name').val("");
        $('#i_shop_name').attr('readonly',false);
        $("#input_area").find(".box").hide();
        $('#shop_address').removeClass('d-flex');
        id = document.getElementById('sample').value;
        if (id == 'question') {
            $('#question').show();
        } else if (id == 'other') {
            $('#other').show();
        } else if (id == 'del') {
            $('#del').show();
            $('#select_del').val(0);
        } else if (id == 'add') {
            $('#add').show();
            $('#select_add').val(0);
        }
    }
}
function add_viewChange() {
    if (document.getElementById('add')) {
        $('#i_shop_name').val("");
        $('#i_shop_name').attr('readonly',false);
        $("#input_area").find(".box").hide();
        $('#shop_address').removeClass('d-flex');
        id = document.getElementById('select_add').value;
        $('#add').show();
        if (id == 'shop') {
            $('#shop_name').show();
            $('#shop_address').addClass('d-flex');
            $('#note').show();
        } else if (id == 'emp') {
            $('#shop_name').show();
            $('#phone').show();
            $('#note').show();
        }
    }
}
function del_viewChange() {
    if (document.getElementById('del')) {

        $("#input_area").find(".box").hide();
        id = document.getElementById('select_del').value;
        $('#del').show();
        if (id == 'shop') {
            $('#i_shop_name').val('');
            $('#i_shop_name').attr('readonly',false);
            $('#shop_name').show();
            $('#note').show();
        } else if (id == 'emp') {
            if (shop_name) {
                $('#i_shop_name').val(shop_name);
                $('#i_shop_name').attr('readonly',true);
            }
            $('#shop_name').show();
            $('#note').show();
        }
    }
}
