function viewChange(){
  if(document.getElementById('sample')){
      id = document.getElementById('sample').value;
      if(id == '1'){
          document.getElementById('Box1').style.display = "";
          document.getElementById('Box2').style.display = "none";
      }else if(id == '2'){
          document.getElementById('Box1').style.display = "none";
          document.getElementById('Box2').style.display = "";
      }
  }

window.onload = viewChange;
}