// (function ($) {
//   // Variable to store the last scroll position.
//   let initialTranslate = 0;
  
//   // Flag to check if we are already scrolling.
//   let isScrolling = false;

//   // Function to be executed on scroll.
//   const onScroll = function () {
//       // Getting the current scroll position.
//       let currentScrollTop = $(this).scrollTop();
      
//       // Determining the direction of scrolling.
//       let direction = currentScrollTop > initialTranslate ? 'down' : 'up';

//       // Iterating over each .image-grid-image element.
//       $('.image-grid-image').each(function () {
//           const $this = $(this); // jQuery object of the current .image-grid-image element.
//           const isLast = $this.is(':last-child'); // Boolean indicating whether this element is the last child.
//           const $parentSection = $this.closest('section'); // Closest parent section of the current element.
//           const $prevSection = $parentSection.prev('section'); // Previous section of the parent section.
//           const $nextSection = $parentSection.next('section'); // Next section of the parent section.
          
//           // Parsing the translateY value from the transform CSS property of the current element.
//           let translateY = parseInt($this.css('transform').split(',')[5]) || 0;

//           // Conditions to stop moving the first image downwards and the last image upwards.
//           const canMoveFirstDown = !($nextSection.length && $this.offset().top + $this.height() >= $nextSection.offset().top && direction === 'down');
//           const canMoveLastUp = !($prevSection.length && $this.offset().top <= $prevSection.offset().top + $prevSection.height() && direction === 'up');

//           // Adjusting translateY based on the direction of scrolling and whether the element is the last child.
//           if (isLast) {
//               if (direction === 'down' && canMoveLastUp) translateY -= 1;
//               else if (direction === 'up' && canMoveFirstDown) translateY += 1;
//           } else {
//               if (direction === 'down' && canMoveFirstDown) translateY += 1;
//               else if (direction === 'up' && canMoveLastUp) translateY -= 1;
//           }

//           // Applying the new translateY value to the transform property of the current element.
//           $this.css({'transform': 'translateY(' + translateY + 'px)'});
//       });

//       // Updating the last scroll position.
//       initialTranslate = currentScrollTop;
//   };

//   // Callback function to be executed when .image-grid-image elements intersect the viewport.
//   const callback = (entries, observer) => {
//       entries.forEach(entry => {
//           // If the entry is intersecting and we are not already scrolling.
//           if (entry.isIntersecting && !isScrolling) {
//               isScrolling = true; // Set scrolling flag to true.
//               observer.disconnect(); // Disconnect the observer as it's no longer needed.
//               $(window).on('scroll', onScroll); // Attach the scroll event listener.
//           }
//       });
//   };

//   // Options for the IntersectionObserver.
//   const options = {
//       root: null, // Using the viewport as the container.
//       rootMargin: '0px', // No margins.
//       threshold: 0 // Threshold of 0.
//   };

//   // Creating a new IntersectionObserver with the callback and options.
//   const observer = new IntersectionObserver(callback, options);

//   // Observing each .image-grid-image element.
//   $('.image-grid-image').each(function () {
//       observer.observe(this); // Start observing this element.
//   });

// })(jQuery);
