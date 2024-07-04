
(function ($) {
  // Initialize the last scroll position.
  let lastScrollTop = 0;

  // Initialize the translateY value.
  let translateY = 0;

  /**
   * Event Listener for 'shown.bs.collapse' event.
   * This event is triggered when an accordion element has been made visible to the user.
   * 
   * @event
   * @listens shown.bs.collapse
   */
  $('.big-text-accordion-section .accordion').on('shown.bs.collapse', function () {
    // Get the current accordion being processed.
    const accordion = $(this);

    // Delay adding 'opened' class to the '.accordion-body-image' inside the current accordion
    // until after a delay of 1500ms (1.5s).
    setTimeout(function () {
      accordion.find('.accordion-body-image').addClass('opened');
    }, 1500)
  });

  /**
   * Event Listener for 'hide.bs.collapse' event.
   * This event is triggered when an accordion element is about to be hidden from the user.
   * 
   * @event
   * @listens hide.bs.collapse
   */
  $('.big-text-accordion-section .accordion').on('hide.bs.collapse', function () {
    // Remove 'opened' class from all '.accordion-body-image' elements and reset their transform property.
    $('.accordion-body-image').removeClass('opened');
    $('.accordion-body-image').css('transform', '');

    // Reset the last scroll position and translateY to their initial values.
    lastScrollTop = 0;
    translateY = 0;
  });

  /**
   * Check if '.big-text-accordion-section .accordion' exists on the page.
   * If it does exist, attach a scroll event listener to the window.
   */
  if ($('.big-text-accordion-section .accordion').length > 0) {
    /**
     * Event Listener for window 'scroll' event.
     * This event is triggered whenever the user scrolls the window.
     * 
     * @event
     * @listens scroll
     */
    $(window).scroll(function () {
      // Get the current scroll position.
      let currentScrollTop = $(this).scrollTop();
      // Check the scrolling direction and modify translateY accordingly.
      if (currentScrollTop > lastScrollTop) {
        // Scrolling Down: Decrease translateY by 1.
        translateY -= 1;
      } else if (currentScrollTop < lastScrollTop) {
        // Scrolling Up: Increase translateY by 1.
        translateY += 1;
      }

      // Apply the translateY value to the transform property of '.accordion-body-image.opened'.
      //$('.big-text-accordion-section .accordion-body-image.opened').css('transform', 'translateY(' + translateY + 'px)');

      // Update the last scroll position to the current scroll position.
      lastScrollTop = currentScrollTop;
    });
  }
})(jQuery);
