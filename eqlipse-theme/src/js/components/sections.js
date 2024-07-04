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
      }
    });
  };

  /**
   * Options for the IntersectionObserver.
   * root: The element that is used as the viewport for checking visibility.
   * rootMargin: Margin around the root to expand/reduce the area for checking visibility.
   * threshold: Percentage of the target's visibility. 0.3 means 30% visible.
   */

  let threshold;

  if (window.innerWidth <= 576) { // Small devices
    threshold = 0;
  } else if (window.innerWidth <= 768) { // Medium devices
    threshold = 0.2;
  } else { // Large devices
    threshold = 0.3;
  }
  const options = {
    root: null,       // Sets the observing viewport to the browser's viewport.
    rootMargin: '0px',
    threshold
  };

  /**
   * Create a new IntersectionObserver instance with the specified callback function 
   * and options.
   */
  const observer = new IntersectionObserver(callback, options);

  /**
   * Use jQuery to select all elements with the 'section' class and start observing 
   * each of them to detect when they intersect with the viewport.
   */
  $('.section').each(function () {
    observer.observe(this);
  });
})(jQuery);