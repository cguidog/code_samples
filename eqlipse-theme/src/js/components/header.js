(function ($) {
  //Handles navbar overlay
  $('#main-menu .nav-link').on('show.bs.dropdown', function (e) {

    const target = $(`.dropdown-menu[aria-labelledby=${e.target.id}]`);
    target.css('max-height', '100vh');
    const links = target.find('.dropdown-item');
    const parentSiblings = target.parent().nextAll();
    $(links).each(function (index, element) {
      setTimeout(function () {
        $(element).css('opacity', '1');
      }, 100 * (index + 1));
    })
    $('#navbar-overlay').addClass('expanded');
    $('#main-nav').addClass('nav-expanded');
    $(parentSiblings).addClass('menu-expanded');
  });
  $('#main-menu .nav-link').on('shown.bs.dropdown', function (e) {
    setTimeout(function() {
      $('#navbar-overlay').css('height', $('#wrapper-navbar').height() + 100);
  }, 100);
  });

  $('#main-menu .nav-link').on('hidden.bs.dropdown', function (e) {
    const target = $(`.dropdown-menu[aria-labelledby=${e.target.id}]`);
    const links = target.find('.dropdown-item');
    const dropdowns = $('#main-menu .nav-link');
    const openDropdowns = dropdowns.filter('.show');

    target.css('max-height', '0');
    $(links).css('opacity', 0);
    $('.menu-item').removeClass('menu-expanded');
    if (openDropdowns.length === 0) {
      $('#main-nav').removeClass('nav-expanded');
      $('#navbar-overlay').removeClass('expanded');
      $('.dropdown-menu').css('max-height', '0');
      setTimeout(function() {
        $('#navbar-overlay').css('height', '');
    }, 201);
    }

    setTimeout(function() {
      $('#navbar-overlay').css('height', $('#wrapper-navbar').height() + 100);
  }, 200);
  });

  $('#navbar-toggler').on('click', function() {
    $('#navbar-overlay, #main-nav').toggleClass('expanded-mobile');
    $('main, footer').toggleClass('mobile-hidden');
  });

  //Handles search functionality
  $('.search-form-trigger').on('click', function () {
    $(this).parent().toggleClass('active');
    $('#main-menu').toggleClass('search-active');
    $('.navbar-brand-toggler-container').toggleClass('search-active');
  });

})(jQuery);