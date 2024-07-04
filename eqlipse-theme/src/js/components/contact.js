(function ($) {
  // Add a click event listener to all elements with the class 'address-contact-button'.
  $('.address-contact-button').on('click', function () {
    // Extract the 'office' and 'routing' data attributes from the clicked button.
    const office = $(this).data('office');
    const routingId = $(this).data('routing');

    // If a 'routingId' is present, set the value of the input with the name equal to 'routingId' to 'office'.
    if (routingId) {
      $(`input[name=${routingId}]`).val(office);
    }

    // Focus the first input inside the form located within the 'contact-form-container' element.
    $('.contact-form-container form input').eq(0).focus();

    // Disable the clicked button and all elements with the class 'address-map-button'.
    $(this).attr('disabled', true);
    $('.address-map-button').attr('disabled', true);

    // Add the class 'expanded' to the 'contact-form-container' to probably expand it (depends on the CSS).
    $('.contact-form-container').addClass('expanded');

    // Scroll the 'contact-form-container' and the whole page to the top, fast.
    $('.contact-form-container').animate({ scrollTop: 0 }, "fast");
    $("html, body").animate({ scrollTop: 0 }, "fast");
  });

  // Add a click event listener to the close button inside the 'contact-form-container'.
  $('.contact-form-container .close-button').on('click', function () {
    // Remove the 'expanded' class from the parent of the clicked close button, likely collapsing it.
    $(this).parent().removeClass('expanded');

    // Enable the 'address-contact-button' and 'address-map-button' elements, which were disabled earlier.
    $('.address-contact-button').attr('disabled', false);
    $('.address-map-button').attr('disabled', false);
  });

  // Initialize cumulativeDelay to keep track of the cumulative delay required 
  // before showing each .location-details
  let cumulativeDelay = 0;

  // Iterate over each .location-details element.
  $('.location-details').each(async function (index, element) {

    // If it’s not the first .location-details element,
    // calculate the total delay required based on the .office-container elements 
    // in the previous .location-details element.
    if (index > 0) {
      // Get the previous .location-details element.
      const previousElement = $('.location-details').eq(index - 1);

      // Find all .office-container elements in the previous .location-details element.
      const officeContainers = previousElement.find('.office-container');

      // Calculate and add the cumulative delay: 
      // 150 for the .location-details and 100 for each .office-container.
      cumulativeDelay += 150 + (100 * officeContainers.length);
    } else {
      // For the first .location-details, add the base delay.
      cumulativeDelay += 150;
    }

    // Wait for the cumulative delay and then display the current .location-details element.
    await new Promise(resolve => setTimeout(resolve, cumulativeDelay));
    $(element).addClass('visible');

    // For each .office-container element inside the current .location-details,
    // add a delay to make them visible sequentially.
    $(element).find('.office-container').each(function (index, element) {
      setTimeout(() => $(element).addClass('visible'), 100 * (index + 1));
    });
  });
})(jQuery);