// ロック用関数
function screenLock() {
    var loader_element = document.getElementById('loader');
    loader_element.style.display = 'block'
    // ロック用のdivを生成
    var element = document.createElement('div');
    element.id = "screenLock";
    // ロック用のスタイル
    element.style.height = '100%';
    element.style.left = '0px';
    element.style.position = 'fixed';
    element.style.top = '0px';
    element.style.width = '100%';
    element.style.zIndex = '9999';
    element.style.opacity = '0.4';
    element.style.background = 'gray';

    

    var objBody = document.getElementsByTagName("body").item(0);
    objBody.appendChild(element);

    
    element.appendChild(loader_element);

}

// div削除関数
function delete_dom_obj() {
    var dom_obj = document.getElementById('screenLock');
    var dom_obj_parent = dom_obj.parentNode;
    dom_obj_parent.removeChild(dom_obj);
}