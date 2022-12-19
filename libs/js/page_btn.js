//@index=現在のページ
//@length=最大のページ数
function set_page_btn(index, length) {
    const COUNT = isMobile ? length < 3 ? length : 3 : length < 9 ? length : 9;
    const MIDDLE = isMobile ? 2:5;
    const CLASS = 'style_pages';
    const CURRENT_CLASS = 'aria-current';

    const FIRST_BTN = `<li><a data-index="0"><img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e %3cpath fill='%237e7e7e' d='M0 2.08L5.92 8 0 13.92l1.82 1.82L9.55 8 1.82.27 0 2.08zM13.43 16V0H16v16h-2.57z' /%3e %3c/svg%3e" alt="最初のページを表示" class="style_prevIcon__38uVL" decoding="async"></a></li>`;
    const LAST_BTN = `<li><a data-index="last"><img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e %3cpath fill='%237e7e7e' d='M0 2.08L5.92 8 0 13.92l1.82 1.82L9.55 8 1.82.27 0 2.08zM13.43 16V0H16v16h-2.57z' /%3e %3c/svg%3e" alt="最後（500）のページを表示" class="style_nextIcon__M_Me_" decoding="async"></a></li>`;
    const PREV_BTN = `<li><a data-index="prev"><img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e %3cpath fill='%237e7e7e' d='M4.83 16l-1.7-1.7L9.44 8l-6.3-6.3L4.83 0l8 8-8 8z' /%3e %3c/svg%3e" alt="前（1）ページを表示" class="style_prevIcon__38uVL" decoding="async"></a></li>`;
    const NEXT_BTN = `<li><a data-index="next"><img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e %3cpath fill='%237e7e7e' d='M4.83 16l-1.7-1.7L9.44 8l-6.3-6.3L4.83 0l8 8-8 8z' /%3e %3c/svg%3e" alt="次（3）ページを表示" class="style_nextIcon__M_Me_" decoding="async"></a></li>`;


    //初期化
    $(`.${CLASS}`).empty();
    //buttonの追加

    //ページが1しかないときは追加しない
    if (length === 1) return;

    if (index > 1) {
        $(`.${CLASS}`).append(FIRST_BTN);
        $(`.${CLASS}`).append(PREV_BTN);
    }else{
        $(`.${CLASS}`).append('<li>');
        $(`.${CLASS}`).append('<li>');
    }

    if (index <= MIDDLE) {
        for (let i = 0; i < COUNT; i++) {
            $(`.${CLASS}`).append(`<li><a data-index="${i}">${(i + 1)}</a></li>`);
            if (i + 1 == index) {
                $(`.${CLASS} li:last a`).addClass(CURRENT_CLASS);
            }
        }
    }

    if(index > MIDDLE && length >= index+MIDDLE){
        for (let i = index - MIDDLE; i < COUNT+index -MIDDLE; i++) {
            $(`.${CLASS}`).append(`<li><a data-index="${i}">${(i + 1)}</a></li>`);
            if (i + 1 == index) {
                $(`.${CLASS} li:last a`).addClass(CURRENT_CLASS);
            }
        }
    }

    if(index > MIDDLE && length < index+MIDDLE){
        for (let i = length - COUNT; i < length; i++) {
            $(`.${CLASS}`).append(`<li><a data-index="${i}">${(i + 1)}</a></li>`);
            if (i + 1 == index) {
                $(`.${CLASS} li:last a`).addClass(CURRENT_CLASS);
            }
        }
    }


    if (index < length) {
        $(`.${CLASS}`).append(NEXT_BTN);
        $(`.${CLASS}`).append(LAST_BTN);
    }else{
        $(`.${CLASS}`).append('<li>');
        $(`.${CLASS}`).append('<li>');
    }
}