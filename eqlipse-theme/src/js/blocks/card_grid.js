(function ($) {
  /**
   * The callback function for the IntersectionObserver API.
   * Iterates over each entry to check if the target element is intersecting (visible) 
   * within the specified threshold. If the element is intersecting, the 'in-viewport' 
   * class is added to the element using jQuery.
   * 
   * @param {Array} entries - An array of IntersectionObserverEntry objects.
   * @param {IntersectionObserver} observer - The IntersectionObserver instance.
   */
  const callback = (entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        $(entry.target).addClass('in-viewport');

        $(entry.target).find('.split-text').each(function (index, element) {
          setTimeout(function () {
            $(element).addClass('visible');
          }, 15 * (index + 1));
        });
      }
    });
  };

  /**
   * Options for the IntersectionObserver.
   * root: The element that is used as the viewport for checking visibility.
   * rootMargin: Margin around the root to expand/reduce the area for checking visibility.
   * threshold: Percentage of the target's visibility. 0.3 means 30% visible.
   */
  const options = {
    root: null,       // Sets the observing viewport to the browser's viewport.
    rootMargin: '0px',
    threshold: 0.3
  };

  /**
   * Create a new IntersectionObserver instance with the specified callback function 
   * and options.
   */
  const observer = new IntersectionObserver(callback, options);

  /**
   * Use jQuery to select all 'card-grid-section card' elements with the class and start observing 
   * each of them to detect when they intersect with the viewport.
   */
  $('.card-grid-section .card').each(function () {
    observer.observe(this);
  });
})(jQuery);