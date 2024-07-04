(function ($) {
  // Check if the homepage hero heading image exists on the page
  const paths = $('.homepage-hero-container-heading-image > svg > g > g > .cls-1').get();

  $.each(paths, function (index, element) {
    setTimeout(function () {
      $(element).addClass('animate');
    }, 150 * (index + 1));
  });

  //Adjust the height of the hero H1 so the SVG text sticks to the bottom of the hero container
  $('.homepage-hero-container-heading-image').css('height', $('.homepage-hero-container-heading-image').height() * 0.78);


  if ($('.hero-content-heading > span').length > 0 || $('.homepage-hero-video-quote-container-quote').length > 0 || $('.hero-content-heading > img').length > 0) {
    $('.hero-content-heading > span, .homepage-hero-video-quote-container-quote > span, .hero-content-heading > img, .hero-content-text').each(function (index, element) {
      setTimeout(function () {
        $(element).addClass('visible');
      }, 100 * (index + 1));
    });

    const titleLength = $('.hero-content-heading > span, .homepage-hero-video-quote-container-quote > span').length;
    $('.hero-content-date, .hero-content-link').each(function (index, element) {
      setTimeout(function () {
        $(element).addClass('visible');
      }, 100 * (titleLength + 3));
    });

    const callback = (entries, observer) => {
      entries.forEach(entry => {

        if (entry.isIntersecting) {
          $(entry.target).removeClass('scroll-out');
        } else {
          $(entry.target).addClass('scroll-out');
        }
      });
    };

    const options = {
      root: null,
      rootMargin: '0px',
      threshold: 0.9
    };

    const observer = new IntersectionObserver(callback, options);

    $('.hero-observer').each(function () {
      observer.observe(this);
    });
  }

  const $headingContainer = $('.homepage-hero-overlay');
  const $heroHeading = $('.homepage-hero-container-heading-image');

  // Function to resize the hero heading
  function resizeHeroHeading() {
    $heroHeading.css('width', $headingContainer.width() + 1);
  }
  resizeHeroHeading();

  $(window).on('resize', resizeHeroHeading);

  if ($headingContainer.length > 0 && $heroHeading.length > 0) {
    $(window).on('scroll', function () {
      const containerBottom = $headingContainer.offset().top + $headingContainer.height();
      const scrollTop = $(this).scrollTop();
      const stickyElemHeight = $heroHeading.height();

      if ((scrollTop + window.innerHeight) >= containerBottom) {
        if (containerBottom - scrollTop - 300 <= stickyElemHeight) {
          $heroHeading.addClass('fixed-bottom-heading');
        } else {
          $heroHeading.removeClass('fixed-bottom-heading');
        }
      } else {
        $heroHeading.removeClass('fixed-bottom-heading');
      }
    });
  }
})(jQuery);