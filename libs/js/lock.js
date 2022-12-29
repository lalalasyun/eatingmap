// ロック用関数
let timer;
function screenLock() {
    var objBody = $("body");

    var element = $('<div id="loader"></div>');
    
    objBody.append(element);

    timer = setTimeout(() => {
        element.append('<div class="loader"></div>');
    }, 500);
}

// div削除関数
function delete_dom_obj() {
    $('#loader').remove();
    clearTimeout(timer);
}