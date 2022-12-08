
function confirm_test() {
    var select = confirm("削除しますか？");
    console.log(select)
    if(select){
        /*削除処理*/
    }
    return select;
}
