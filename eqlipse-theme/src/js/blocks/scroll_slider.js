(function ($) {

  jQuery(document).ready(function ($) {
    if (jQuery('.scroll-slider').length > 0) {
      const spaceHolder = document.querySelector('.scroll-space');
      const horizontal = document.querySelector('.horizontal-container');
      spaceHolder.style.height = `${calcDynamicHeight(horizontal)}px`;

      function calcDynamicHeight(ref) {
        const vw = window.innerWidth;
        const vh = window.innerHeight;
        const objectWidth = ref.scrollWidth;
        // 150 is the padding (in pixels) desired on the right side of the .scroll-slides-container
        return objectWidth - vw + vh + 32;
      }

      window.addEventListener('scroll', () => {
        const sticky = document.querySelector('.sticky-container');
        horizontal.style.transform = `translateX(-${sticky.offsetTop}px)`;
      });

      window.addEventListener('resize', () => {
        spaceHolder.style.height = `${calcDynamicHeight(horizontal)}px`;
      });
    }
  });
})(jQuery);