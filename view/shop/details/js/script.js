$(function () {
    $(document).ready(async function () {
        let data = {
            name: shop.name,
            image: shop.image,
            id: shop.id
        };
        let json = {};
        if(sessionStorage.getItem('recently')){
            json = JSON.parse(sessionStorage.getItem('recently'));
        }
        json[shop.id] = data;
        sessionStorage.setItem('recently', JSON.stringify(json));
    });
});
