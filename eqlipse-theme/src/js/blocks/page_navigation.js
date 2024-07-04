(function ($) {
  /**
   * Checks if a given jQuery element is visible within the current viewport.
   *
   * @param {jQuery} $element - The jQuery element to check visibility for.
   *
   * @returns {boolean} Returns `true` if the element is visible in the viewport, 
   * otherwise returns `false`.
   *
   * @example
   * if (isElementVisible($('.my-element'))) {
   *   console.log('The element is visible in the viewport.');
   * } else {
   *   console.log('The element is NOT visible in the viewport.');
   * }
   */

  function isElementVisible($element) {
    var viewportTop = $(window).scrollTop() + 100,
      viewportBottom = viewportTop + $(window).height() + 100,
      elementTop = $element.offset().top,
      elementBottom = elementTop + $element.height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
  }

/**
 * Scrolls the webpage to a specific target element or selector.
 * 
 * This function takes into account the height of the `#wrapper-navbar` and an additional offset 
 * to adjust the scroll position. It's particularly useful for single page sites with fixed headers 
 * or when trying to navigate to page sections using anchor links.
 * 
 * @param {Event} [e] - The event object (usually from a click event). If provided, the function will prevent the default action.
 * @param {string|jQuery} element - A string representing the target selector or a jQuery object. 
 *                                 If a jQuery object is provided, the function will attempt to get the `href` attribute as the target selector.
 */

  function targetScroll(e, element) {
    e && e.preventDefault();
    const offset = 64;
    const headerHeight = $('#wrapper-navbar').height() + offset;
    const target = typeof element !== 'string' ? $(element).attr('href') : element;
    $('html, body').animate({
      scrollTop: $(target).offset().top - headerHeight,
    }, 100);
  }

  if ($('.page-navigation').length > 0) { //Handles Page Navigation element

    const nav = $('.page-navigation').first();
    const top = nav.offset().top;
    const height = nav.height();

    $(window).on('scroll', function () {
      if ($(window).scrollTop() > top - height) { //Reveals header page navigation.
        $('.page-navigation').addClass('visible');
      }

      if ($('.page-navigation').hasClass('visible') && $(window).scrollTop() < top - height) { //Hides header page navigation.
        $('.page-navigation').removeClass('visible');
      }

      $('.page-navigation .page-navigation_link').removeClass('active');

      let foundVisible = false;

      $('.page-navigation .page-navigation_link').each(function () {
        if (foundVisible) {
          return;  // If a visible target has already been found, exit the loop
        }
        const target = $($(this).attr('href')); // Get the target element

        if (isElementVisible(target)) {
          $(this).addClass('active'); // Add 'active' class to the link if its target is visible
          foundVisible = true;  // Mark a visible target as found
        }
      });
    });

    $('.page-navigation .page-navigation_link').on('click', function (e) { targetScroll(e, this) });
  }

  $(window).on('load', function () { //Overrides native target scroll.
    if (window.location.hash) {
      const target = window.location.hash;
      targetScroll(null, target);
    }
  })
})(jQuery);