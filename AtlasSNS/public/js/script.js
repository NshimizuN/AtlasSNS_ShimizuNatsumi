jQuery(function ($) {
  $('.js-accordion-title').on('click', function () {
    /*クリックでコンテンツを開閉*/
    $(this).toggleClass('is-open');
    /*矢印の向きを変更*/
    $(this).siblings('.accordion-content').toggleClass('is-open');
  });

});

//window.alert("aaa");
