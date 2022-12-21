$(function () {
    $(document).ready(async function () {
        const NOW_TIME = Date.now();
        let data = {
            name: shop.name,
            image: shop.image,
            id: shop.id,
            date:NOW_TIME
        };
        let json = {};

        if(localStorage.getItem('recently')){
            json = JSON.parse(localStorage.getItem('recently'));
            for(let key in json){
                //86400000 * 7 1週間
                let diff = NOW_TIME - json[key].date;
                if(diff > 86400000 * 7){
                    delete json[key];
                    console.log(`${key}:del`)
                }
            }
        }

        json[shop.id] = data;
        localStorage.setItem('recently', JSON.stringify(json));
    });
});
