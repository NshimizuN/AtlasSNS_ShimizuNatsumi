//実装確認
//$(function () { // if document is ready
//  alert('hello world')
//});

//アコーディオンメニュー 開閉
jQuery(function ($) {
  /*コンテンツを非表示↓*/
  $('.accordion-container').hide();
  /*コンテンツのタイトルをクリック↓*/
  $('.js-accordion-title').on('click', function () {
    /*クリックでコンテンツを開閉*/
    $(this).next().slideToggle(200);
    /*矢印の向きを変更*/
    $(this).toggleClass('open', 200);
  });
});


//アコーディオンメニュー ホバーイベント
//ホームをホバーした時、背景青・文字色白になる
$(function () {
  $('.accordion-list1').hover(
    function () {
      $('.accordion-list1').css('background', '#206ccc');
      $('.accordion-list1').css('transition', '0.3s');
      $('.home-text').css('color', '#fff');
      $('.home-text').css('transition', '0.3s');
    },
    //ホームをホバーしてない時、背景白・文字色青になる
    function () {
      $('.accordion-list1').css('background', '#fff');
      $('.accordion-list1').css('transition', '0.3s');
      $('.home-text').css('color', '#206ccc');
      $('.home-text').css('transition', '0.3s');
    }
  );
});

//プロフィール編集をホバーした時、背景青・文字色白になる
$(function () {
  $('.accordion-list2').hover(
    function () {
      $('.accordion-list2').css('background', '#206ccc');
      $('.accordion-list2').css('transition', '0.3s');
      $('.profile-text').css('color', '#fff');
      $('.profile-text').css('transition', '0.3s');
    },
    //プロフィール編集をホバーしてない時、背景白・文字色青になる
    function () {
      $('.accordion-list2').css('background', '#fff');
      $('.accordion-list2').css('transition', '0.3s');
      $('.profile-text').css('color', '#206ccc');
      $('.profile-text').css('transition', '0.3s');
    }
  );
});

//ログアウトをホバーした時、背景青・文字色白になる
$(function () {
  $('.accordion-list3').hover(
    function () {
      $('.accordion-list3').css('background', '#206ccc');
      $('.accordion-list3').css('transition', '0.3s');
      $('.logout-text').css('color', '#fff');
      $('.logout-text').css('transition', '0.3s');
    },
    //ログアウトをホバーしてない時、背景白・文字色青になる
    function () {
      $('.accordion-list3').css('background', '#fff');
      $('.accordion-list3').css('transition', '0.3s');
      $('.logout-text').css('color', '#206ccc');
      $('.logout-text').css('transition', '0.3s');
    }
  );
});



//モーダル機能
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});

//削除ボタン
//マウスオーバー時の処理
//マウスを乗せたら発動
$(function () {
  //画像のsrc属性が別画像のパスに切り替わる
  $('.btn-delete').hover(function () {
    //画像のsrc属性が別画像のパスに切り替わる
    $(this).attr('src', './images/trash-h.png');
    //マウスを離したときの処理
  }, function () {
    //下の画像に戻す
    $(this).attr('src', './images/trash.png');
  });
});

//window.alert("aaa");
