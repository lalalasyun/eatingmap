$(function () {
  let genre = 0;
  let select = 0;
  let page_index = 0;
  let shop_data;

  $(document).ready(function () {
    // URLを取得
    let url = new URL(window.location.href);

    // URLSearchParamsオブジェクトを取得
    let params = url.searchParams;

    // getメソッド
    if(params.get('genre')){
      select = params.get('genre');
    }
    let pref = params.get('pref');
    let city = params.get('city');
    let price = params.get('price');
    page_index = params.get('code') * 5;

    $(".title").next(".box").slideToggle();

    change_genre(select);
    setTimeout(() => {
      $('#select-pref').val(pref);
      change_pref();
      $('#select-city').val(city);
      $('#price').val(price);
      get_shop(genre, page_index);
    }, 100);
  });

  $('.title').on('click', function () {//タイトル要素をクリックしたら
    page_index = 0;
    get_shop(genre);
  });

  $('#select-pref,#select-city,#price').change(function () {
    page_index = 0;
    get_shop(genre);
  });

  $("#next_btn").click(async function () {
    if (shop_data.length > page_index + 5) {
      page_index += 5;

      set_shop(shop_data);
      $("#prev_btn").prop('disabled', false);
      if (shop_data.length - page_index < 6) {
        $(this).prop('disabled', true);
      }

    }

  });
  $("#prev_btn").click(async function () {
    if (page_index > 4) {
      page_index -= 5;
      set_shop(shop_data);
      $("#next_btn").prop('disabled', false);
      if (page_index < 4) {
        $(this).prop('disabled', true);
      }
    }
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
    page_index = 0;
    get_shop(genre);
  });

  async function set_shop(shop_data) {
    change_url();
    screenLock();
    let count = 0;
    $('#shop_list').attr('id', 'shop_list_prev');
    $('#shop_list_prev').after('<div id="shop_list" style="display:none;"></div>');
    for (let i = page_index; i < shop_data.length; i++) {
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
      if (count == 4) {
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
      shop_data = data;

      $("#shop_list").html("");

      await set_shop(shop_data);
      $("#search_count").html(shop_data.length)
      //6件以下だとnextをdisabled
      let is_next = shop_data.length < 6 || (shop_data.length - page_index) < 6;
      let is_prev = page_index < 4;
      $("#next_btn").prop('disabled', is_next);

      $("#prev_btn").prop('disabled', is_prev);
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
    let code = Math.floor(page_index / 5);
    const keys = ["genre", "pref", "city", "price"]
    let params = [select, pref, city, price];
    let url = `/search/genre?code=${code}`;
    for (var i in keys) {
      if (params[i] != "") {
        url += `&${keys[i]}=${params[i]}`;
      }
    }
    history.replaceState('', '', url);
  }

});

