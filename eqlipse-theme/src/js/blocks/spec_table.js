(function ($) {
  function openAccordion () {
    if ($(window).width() >= 768) {
      $('.table.accordion-collapse').addClass('show');
    } else if ($('.table.accordion-collapse').hasClass('show')) {
      $('.table.accordion-collapse').removeClass('show')
    }
  }

  openAccordion();

  $(window).on('resize', function(){
    openAccordion();
  });
})(jQuery);
