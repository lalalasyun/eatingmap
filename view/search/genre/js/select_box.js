$(function () {
  let genre = 0;
  let page_index = 0;
  let shop_data;

  $(document).ready(function () {
    get_shop(0);
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

      await get_shop(genre);
      $("#prev_btn").prop('disabled', false);

    }

  });
  $("#prev_btn").click(async function () {
    if (page_index > 4) {
      page_index -= 5;
      await get_shop(genre);
      $("#next_btn").prop('disabled', false);
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
    page_index = 0;
    get_shop(genre);
  });

  async function set_shop(shop_data) {
    let count = 0;
    $("#shop_list").html("");
    for (let i = page_index; i < shop_data.length; i++) {
      let shop = shop_data[i];
      $("#shop_list").append(`<div id=${shop.id} class="shop_data">`);
      //templateをloadし各種データを埋め込む
      $(`#${shop.id}`).load("/view/search/genre/main/template.html", function (myData, myStatus) {
        $(`#${shop.id}`).find(".shopname").html(shop.name);
        $(`#${shop.id}`).find(".shopscore").html(shop.score);
        $(`#${shop.id}`).find(".shopimage").attr('src', `/images/shopImage/${shop.image}`);
      });
      //buttonにshopページへのリンクイベントを付与
      $(`#${shop.id}`).on("click", ".shopbtn", function () {
        window.location.href = `/shop/${shop.id}`;
      });
      if (count == 4) {
        break;
      }
      count++;
    }

  }

  async function get_shop(genre) {
    screenLock();
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

      //6件以下だとnextをdisabled
      let is_next = shop_data.length < 6 || (shop_data.length - page_index) < 6;
      let is_prev = page_index < 4;
      $("#next_btn").prop('disabled', is_next);

      $("#prev_btn").prop('disabled', is_prev);
    });
    delete_dom_obj();
  }

});