// Add your custom JS here.
import LazyLoad from 'vanilla-lazyload';
import './blocks/big_text_accordion';
import './blocks/card_grid';
import './blocks/descriptive_list';
// import './blocks/image_grid'; REMOVE FILE AFTER TESTING IMAGE GRID ANIMATION
import './blocks/page_navigation';
import './blocks/scroll_slider';
import './blocks/spec_table';
import './blocks/timeline';
import './components/contact';
import './components/header';
import './components/hero';
import './components/map';
import './components/sections';
import './components/transitions';

var lazyLoadInstance = new LazyLoad();
lazyLoadInstance;

(function ($) {
  //Replaces video placeholder with iframe
  $('.video-player-trigger').on('click', function (event) {
    event.preventDefault();
    const uri = $(this).data('id') + '?rel=0&autoplay=1&loop=0&controls=1&fs=1&modestbranding';
    const parent = $(this).parent();
    $(parent).append(`<div class="ratio ratio-16x9 video-iframe-container"><iframe src=${uri} allow="autoplay" allowfullscreen></iframe></div>`);
    $(parent).find('img').remove();
    $(this).remove();
  });

  //Handles Horizontal Scroll for Product Slider
  $('.post-slider').on('mouseenter', function () {
    $(this).on('wheel.scrollHorizontally', function (e) {

      const slider = $(this);
      const slides = slider.find('.post-slider_slide');

      // Calculate necessary widths and positions
      const slideWidth = slides.first().outerWidth(true); // true to include margins
      const totalWidth = slideWidth * slides.length;
      const maxScrollLeft = totalWidth - slider.outerWidth();
      const currentScrollLeft = slider.scrollLeft();

      if ((e.originalEvent.deltaY > 0 && currentScrollLeft < maxScrollLeft) ||
        (e.originalEvent.deltaY < 0 && currentScrollLeft > 0)) {
        // Apply the scroll effect
        e.preventDefault();
        slider.scrollLeft(currentScrollLeft + e.originalEvent.deltaY);
      }
    });
  }).on('mouseleave', function () {
    $(this).off('wheel.scrollHorizontally');
  });



  // if ($('.post-slider').length > 0) {
  //   // custom cursor for slide_content_link
  //   var customCursor = $('<div class="post-slider-cursor"><img src="/wp-content/themes/eqlipse/assets/images/buttons/eqlipse_pointer.svg"></div>').appendTo('body');
  //   var slideContentLinks = $(".post-slider .slide_content_link");

  //   slideContentLinks.on('mousemove', (event) => {
  //     var mouseY = event.clientY + $(window).scrollTop();
  //     var cursorDistanceFromBottom = slideContentLinks.offset().top + slideContentLinks.height() - mouseY;

  //     customCursor.css({
  //       left: event.clientX - 64 + 'px',
  //       top: mouseY - 64 + 'px',
  //     });

  //     if (cursorDistanceFromBottom <= 20) {
  //       customCursor.removeClass('visible');
  //       slideContentLinks.css('cursor', 'default');
  //     } else {
  //       customCursor.addClass('visible');
  //       slideContentLinks.css('cursor', '');
  //     }
  //   });
  // }



  //Handles Multipurpose Carousel
  $(".owl-carousel.related_content").each(function (index) {
    const $this = $(this);
    $this.owlCarousel({
      nav: true,
      dots: true,
      autoWidth: true,
      merge: true,
      loop: false,
      margin: 32,
      itemsMobile: [479,1],
      onInitialized: function (event) {
        const carousel = event.target;

        // Get controls
        const prevArrow = $(carousel).find('.owl-prev');
        const nextArrow = $(carousel).find('.owl-next');
        const dotControls = $(carousel).find('.owl-dots');

        // Create unique containers for each carousel's controls
        const prevArrowContainer = $('<div class="nav-controls-related_content prev-arrow-related_content-' + index + '"></div>');
        const nextArrowContainer = $('<div class="nav-controls-related_content next-arrow-related_content-' + index + '"></div>');
        const dotsContainer = $('<div class="dot-controls-related_content dot-controls-related_content-' + index + '"></div>');

        // Append the controls to the new containers
        prevArrowContainer.append(prevArrow);
        nextArrowContainer.append(nextArrow);
        dotsContainer.append(dotControls);

        // Create the parent container for the controls
        const parentControlContainer = $('<div class="carousel-controls"></div>');
        parentControlContainer.append(prevArrowContainer);
        parentControlContainer.append(dotsContainer);
        parentControlContainer.append(nextArrowContainer);

        // Append the parent control container after the carousel
        $this.after(parentControlContainer);
      }
    });
  });

  $(".owl-carousel.testimonials").each(function (index) {
    const $this = $(this);
    $this.owlCarousel({
      nav: true,
      dots: true,
      autoWidth: false,
      autoplay: $this.data('autoplay') ? true : false,
      autoplayTimeout: $this.data('interval'),
      autoplayHoverPause: true,
      loop: true,
      items: 1,
      onInitialized: function (event) {
        const carousel = event.target;

        // Get controls
        const prevArrow = $(carousel).find('.owl-prev');
        const nextArrow = $(carousel).find('.owl-next');
        const dotControls = $(carousel).find('.owl-dots');

        // Create unique containers for each carousel's controls
        const prevArrowContainer = $('<div class="nav-controls-testimonials prev-arrow-testimonials-' + index + '"></div>');
        const nextArrowContainer = $('<div class="nav-controls-testimonials next-arrow-testimonials-' + index + '"></div>');
        const dotsContainer = $('<div class="dot-controls-testimonials dot-controls-testimonials-' + index + '"></div>');

        // Append the controls to the new containers
        prevArrowContainer.append(prevArrow);
        nextArrowContainer.append(nextArrow);
        dotsContainer.append(dotControls);

        // Create the parent container for the controls
        const parentControlContainer = $('<div class="carousel-controls"></div>');
        parentControlContainer.append(prevArrowContainer);
        parentControlContainer.append(dotsContainer);
        parentControlContainer.append(nextArrowContainer);

        // Append the parent control container after the carousel
        $this.after(parentControlContainer);
      }
    });
  });
})(jQuery);

