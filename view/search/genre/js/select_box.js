$(function () {
  let shop_index = 0;
  let shop_length = 0;
  let genre = 0;
  let select = 0;
  let shop_data;
  const PAGE = 5;

  $(document).ready(function () {
    // URLを取得
    let url = new URL(window.location.href);

    // URLSearchParamsオブジェクトを取得
    let params = url.searchParams;

    // getメソッド
    if (params.get('genre')) {
      select = params.get('genre');
    }
    let pref = params.get('pref');
    let city = params.get('city');
    let price = params.get('price');
    if (params.get('p') > 0) {
      shop_index = (params.get('p') - 1) * PAGE;
    }

    $(".title").next(".box").slideToggle();

    change_genre(select);
    setTimeout(() => {
      $('#select-pref').val(pref);
      change_pref();
      $('#select-city').val(city);
      $('#price').val(price);
      get_shop(genre, shop_index);
    }, 100);
  });

  $('.title').on('click', function () {//タイトル要素をクリックしたら
    shop_index = 0;
    get_shop(genre);
  });

  $('#select-pref,#select-city,#price').change(function () {
    shop_index = 0;
    get_shop(genre);
  });

  /* ===== Logic for creating fake Select Boxes ===== */
  $('.sel').each(function () {
    $(this).children('select').css('display', 'none');

    var $current = $(this);

    $(this).find('option').each(function (i) {
      if (i == 0) {
        $current.prepend($('<div>', {
          class: $current.attr('class').replace(/sel/g, 'sel__box')
        }));


        var placeholder = $(this).text();
        $current.prepend($('<span>', {
          class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
          text: placeholder,
          'data-placeholder': placeholder
        }));

        return;
      }

      $current.children('div').append($('<span>', {
        class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
        text: $(this).text()
      }));
    });
  });

  // Toggling the `.active` state on the `.sel`.
  $('.sel').click(function () {
    $(this).toggleClass('active');
  });

  // Toggling the `.selected` state on the options.
  $('.sel__box__options').click(function () {
    var txt = $(this).text();
    var index = $(this).index();

    $(this).siblings('.sel__box__options').removeClass('selected');
    $(this).addClass('selected');

    var $currentSel = $(this).closest('.sel');
    $currentSel.children('.sel__placeholder').text(txt);
    $currentSel.children('select').prop('selectedIndex', index + 1);

    genre = $(`#select-profession option:nth-child(${index + 2})`).val();
    select = index;
    shop_index = 0;
    get_shop(genre);
  });

  async function set_shop(shop_data) {
    let page_index = Math.floor(shop_index / PAGE) + 1;
    let page_length = Math.floor((shop_length - 1) / PAGE) + 1;
    $("#search_count").html(shop_length);
    $("#search_page").html(`(${shop_index}〜${shop_index + PAGE}件)`);
    set_page_btn(page_index, page_length);
    set_page_click();
    change_url();
    screenLock();
    let count = 0;
    $('#shop_list').attr('id', 'shop_list_prev');
    $('#shop_list_prev').after('<div id="shop_list" style="display:none;"></div>');
    for (let i = shop_index; i < shop_length; i++) {
      let shop = shop_data[i];
      $("#shop_list").append(`<div id=${shop.id} class="shop_data">`);
      //templateをloadし各種データを埋め込む
      await sampleResolve();
      function sampleResolve() {
        return new Promise(resolve => {
          $(`#shop_list #${shop.id}`).load("/view/search/genre/main/template.html", function (myData, myStatus) {
            $(`#shop_list #${shop.id}`).find(".shopname").html(shop.name);
            $(`#shop_list #${shop.id}`).find(".shopimage").attr('src', `/images/shopImage/${shop.image}`);
            set_star(shop.id, shop.score);
            resolve(true);
          });
        })
      }

      //buttonにshopページへのリンクイベントを付与
      $(`#shop_list #${shop.id}`).on("click", ".shopbtn", function () {
        window.location.href = `/shop/${shop.id}`;
      });
      if (count == PAGE - 1) {
        break;
      }
      count++;
    }
    $('#shop_list').show();
    $('#shop_list_prev').remove();
    delete_dom_obj();

  }

  async function get_shop(genre) {
    let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
    let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
    let price = $("#price").val();
    let json = {
      genre: genre
    }
    if (pref !== "都道府県") {
      json['pref'] = pref;
    }

    if (city !== "市区町村") {
      json['city'] = city;
    }

    if (price !== "") {
      json['price'] = price;
    }
    await $.get("https://app.eatingmap.fun/api/shop/search/index.php", json
    ).done(async function (data) {
      if (!data) {
        shop_data = [];
        shop_length = 0;
        return;
      }
      shop_data = data;
      shop_length = shop_data.length

      if (shop_index > shop_length) {
        let index = shop_length - PAGE;
        shop_index = index > -1 ? index : 0;
      }

      await set_shop(shop_data);
    });
  }

  function set_star(id, score) {
    for (let i = 1; i < 6; i++) {
      if (i == score) {
        $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star active" data-name="${i}">`);
      } else if (i < score) {
        $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star " data-name="${i}">`);
      } else {
        $(`#shop_list #${id}`).find("#rating").append(`<span class="fa fa-star-o" data-name="${i}">`);
      }
    }
  }

  function change_genre(index) {
    const option = `.sel__box__options:eq(${index})`;
    var txt = $(option).text();
    var index = $(option).index();

    $(option).siblings(option).removeClass('selected');
    $(option).addClass('selected');

    var $currentSel = $(option).closest('.sel');
    $currentSel.children('.sel__placeholder').text(txt);
    $currentSel.children('select').prop('selectedIndex', index + 1);

    genre = $(`#select-profession option:nth-child(${index + 2})`).val();
  }

  function change_url() {
    let pref = $("#select-pref").val();
    let city = $("#select-city").val();
    let price = $("#price").val();
    let code = Math.floor(shop_index / PAGE) + 1;
    const keys = ["genre", "pref", "city", "price"]
    let params = [select, pref, city, price];
    let url = `/search/genre?p=${code}`;
    for (var i in keys) {
      if (params[i] != "") {
        url += `&${keys[i]}=${params[i]}`;
      }
    }
    history.pushState('', '', url);
  }

  function set_page_click() {
    /* page_button */
    $(".style_pages li").click(function () {
      let index = $(this).find('a').data('index');
      if (index == 'prev') {
        if (shop_index >= PAGE) {
          shop_index -= PAGE;
          set_shop(shop_data);
        }
        return
      }
      if (index == 'next') {
        if (shop_length > shop_index + PAGE) {
          shop_index += PAGE;
          set_shop(shop_data);
        }
        return
      }
      if (index == 'last') {
        shop_index = Math.floor((shop_length - 1) / PAGE) * PAGE;
        set_shop(shop_data);
        return
      }
      if (shop_index != index * PAGE) {
        shop_index = index * PAGE;
        set_shop(shop_data);
      }

    })
  }

});

