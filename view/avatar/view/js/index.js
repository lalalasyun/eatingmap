$(function () { 
    const icon_w = 100;

    let scaleX = window.innerWidth / icon_w;
    let scaleY = window.innerHeight / icon_w;

    let scale = scaleX  > scaleY ? scaleY : scaleX;

    $(".icon_area").css( { transform: `scale(${scale})` } );
})