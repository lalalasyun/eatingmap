$(function () {
  let genre = 0;
  let page_index = 0;

  $(document).ready(function () {
    get_shop(genre);
  });

  $('.title').on('click', function () {//タイトル要素をクリックしたら
    get_shop(genre);
  });

  $('#select-pref,#select-city,#price').change(function () {
    get_shop(genre);
  });

  $("#next_btn").click(async function () {
    console.log(page_index);
    page_index += 5;
    if(!await get_shop(genre)){
      page_index -=5;
    }

  });
  $("#prev_btn").click(async function () {
    console.log(page_index);
    page_index -= 5;
    if(!await get_shop(genre)){
      page_index +=5;
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
    get_shop(genre);
  });

  function set_shop(shop) {
    $("#shop_list").append(`<div id=${shop.id}>`);
    //templateをloadし各種データを埋め込む
    $(`#${shop.id}`).load("/web/view/search/genre/main/template.html", function (myData, myStatus) {
      $(`#${shop.id}`).find(".shopname").html(shop.name);
      $(`#${shop.id}`).find(".shopscore").html(shop.score);
      $(`#${shop.id}`).find(".shopimage").attr('src', `/web/images/shopImage/${shop.image}`);
    });
    //buttonにshopページへのリンクイベントを付与
    $(`#${shop.id}`).on("click", ".shopbtn", function () {
      window.location.href = `/shop/${shop.id}`;
    });
  }

  function check_area(location, pref, city) {
    var result = location.replace(/\s+/g, "").match(/^(.+?)(?:県|都)(.+?)(?:市|区|町)(.+?)$/);
    if (pref === "都道府県") return true;
    if (result == null) return false;
    if (pref.indexOf(result[1]) == -1) return false;
    if (city !== "市区町村") {
      if (city.indexOf(result[2]) == -1) return false;
    }
    return true;
  }

  function check_price(shop_price, price) {
    if (shop_price == null || price == "") {
      return true;
    }
    return shop_price <= price;
  }

  async function get_shop(genre) {
    //https://app.eatingmap.fun/shop/list
    let json = { "categoryId": genre };
    let isSet = false;
    await $.ajax({
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
      async: true,
      type: 'POST',
      url: 'https://app.eatingmap.fun/shop/list',
      data: JSON.stringify(json),
    }).done(function (data) {
      $("#shop_list").html("");
      console.log(data.data.length,page_index)
      if(page_index > -1 && page_index < data.data.length -5){
        $("#next_btn").show();
      }else{
        $("#next_btn").hide();
      }
      if(page_index > 4){
        $("#prev_btn").show();
      }else{
        $("#prev_btn").hide();
      }

      for (let i = page_index; i < page_index + 5; i++) {
        console.log(data.data.length)
        if (data.data.length <= i || i < 0) break;
        let shop = data.data[i];
        let pref = $("#select-pref").find("option").eq(Number($("#select-pref").val())).html();
        let city = $("#select-city").val() != "" ? $("#select-city").find("option").eq(Number($("#select-city").val()) + 1).html() : "市区町村";
        let price = $("#price").val();
        let location = shop.location1;
        if (check_area(location, pref, city) && check_price(shop.price, price)) {
          set_shop(shop);
          isSet = true;
        }
      }
    })
      // Ajaxリクエストが失敗した場合
      .fail(function (XMLHttpRequest, textStatus, errorThrown) {
        // window.location.href = '/web/view/error/500';
      });
    return isSet;
  }
});