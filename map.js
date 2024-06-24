(function ($) {
  // Initialize the map
  // $el is a jQuery object of the map container element
  let lockedMarker = null;
  let infowindow = null;
  function initMap($el) {
    // Get all marker elements within the map container
    const $markers = $el.find('.marker');

    // Setup map arguments
    const mapArgs = {
      mapId: $el.data('map_id'), // map_id data attribute of the map container
      zoom: $el.data('zoom') || 16, // zoom level, default to 16 if not set
      // Setting up map options
      mapTypeId: google.maps.MapTypeId.ROADMAP, // initial map type is roadmap
      mapTypeControl: false, // disable map type control
      fullscreenControl: false, // disable fullscreen control
      streetViewControl: false, // disable street view control
    };

    // Create a new map instance
    let map = new google.maps.Map($el[0], mapArgs);

    // Initialize an empty array to hold the markers
    map.markers = [];
    // Initialize each marker
    $markers.each(function () {
      initMarker($(this), map);
    });

    // Center the map based on the markers
    centerMap(map);

    // Return the map instance
    return map;
  }

  // Initialize a marker on the map
  // $marker is a jQuery object of the marker element
  function initMarker($marker, map) {
    // Get latitude, longitude, and place_id from data attributes of the marker element
    const inactiveIcon = {
      // Setup marker icon properties
      path: google.maps.SymbolPath.CIRCLE,
      scale: 10,
      fillColor: "#002836",
      fillOpacity: 1,
      strokeWeight: 6,
      strokeColor: "#1bc4ff",
    };
    const activeIcon = {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 10,
      fillColor: "#002836",
      fillOpacity: 1,
      strokeWeight: 6,
      strokeColor: "#dba349",
    };
    const lat = $marker.data('lat');
    const lng = $marker.data('lng');
    const markerData = $marker.data();
    
    const reference = {
      placeId: $marker.data('place_id'),
      lat,
      lng,
    };

    // Parse latitude and longitude as floats and create a LatLng object
    const latLng = {
      lat: parseFloat(lat),
      lng: parseFloat(lng),
    };

    // Create a new marker instance and set its properties
    let marker = new google.maps.Marker({
      position: latLng, // Position of the marker
      map: map, // Map instance on which to place the marker
      icon: inactiveIcon,
      reference // Additional reference data for the marker
    });

    // Add the marker to the markers array of the map instance
    map.markers.push(marker);
    // Add a click event listener to the marker
    google.maps.event.addListener(marker, 'click', function () {
      // Find the target address element using the place_id
      const $targetAddress = $(`#${$marker.data('place_id')}`);
      const markerLatLang = new google.maps.LatLng(marker.reference.lat, marker.reference.lng);
      $('address').removeClass('expanded');

      lockedMarker = marker.reference.placeId;
      // Reset icons for all markers
      map.markers.forEach((item) => {
        item.setIcon(inactiveIcon);
      });
      // Update the clicked marker's icon and center the map on it
      marker.setIcon(activeIcon);
      map.setZoom(18);
      map.panTo(markerLatLang);
      $targetAddress.addClass('expanded');
      // Scroll to the target address element
      scrollToAddress($targetAddress);


      const tooltipContent = `
        <div class="tooltip-content poi-info-window gm-style">
        <div class="title">Eqlipse Location</div>
        <div class="address">
          <div class="address-line full-width">${markerData.street_number} ${markerData.street_name}</div>
          <div class="address-line full-width">${markerData.city}, ${markerData.state} ${markerData.post_code}</div>
          <div class="address-line full-width">${markerData.country}</div>
          <div class="view-link"><a href="https://www.google.com/maps?q=${encodeURIComponent(markerData.address)}" target="_blank">View on Google Maps</a></div>
        </div></div>`;

      if(infowindow) {
        infowindow.close();
      }

            
      infowindow = new google.maps.InfoWindow({
        content: tooltipContent
      });

      infowindow.open(map, marker);


    });
    

    google.maps.event.addListener(marker, 'mouseover', function () {
      marker.setIcon(activeIcon);
    });

    google.maps.event.addListener(marker, 'mouseout', function () {
      if (marker.reference.placeId !== lockedMarker) {
        marker.setIcon(inactiveIcon);
      }
    });
  }

  // Center the map based on its markers
  function centerMap(map) {
    const bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      // Extend the bounds to include the position of each marker
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng(),
      });
    });

    if (map.markers.length == 1) {
      // If there's only one marker, set the center of the map to its position
      map.setCenter(bounds.getCenter());
    } else {
      // If there are multiple markers, fit the map bounds to include all of them
      map.fitBounds(bounds);
    }
  }

  // Scroll the view to the target address element
  // $address is a jQuery object of the target address element
  function scrollToAddress($address) {
    // Calculate the scroll top offset
    const targetOffsetTop = $address.offset().top - $('.office-directory').offset().top;
    const newScrollTop = $('.office-directory').scrollTop() + targetOffsetTop - 100;

    // Animate scrolling to the new scroll top position
    $('.office-directory').animate({
      scrollTop: newScrollTop
    }, 500);
  }

  // Initialize the map when the document is ready
  $(document).ready(function () {
    let map;
    // Initialize the map for each map container element
    $('.acf-map').each(function () {
      map = initMap($(this));
    });



    // Handle click events on address
    $('.address-card').on('click', function () {
      const $button = $(this);
      const $container = $(this);

      // Reset icons for all markers on button click
      map.markers.forEach(item => {
        item.setIcon({
          path: google.maps.SymbolPath.CIRCLE,
          scale: 10,
          fillColor: "#002836",
          fillOpacity: 1,
          strokeWeight: 6,
          strokeColor: "#1bc4ff",
        });
      });

      if (!$container.hasClass('expanded')) {
        // If the address is not expanded, expand it and center the map on the corresponding marker
        const lat = parseFloat($container.data('lat'));
        const lng = parseFloat($container.data('lng'));
        const placeId = $container.attr('id');

        if (!isNaN(lat) && !isNaN(lng)) {
          const latLng = new google.maps.LatLng(lat, lng);
          const targetMarker = map.markers.find(marker => marker.reference.placeId === placeId);

          lockedMarker = placeId;
          map.setZoom(18);
          map.panTo(latLng);

          // Update the marker's icon and scroll to the address element
          targetMarker.setIcon({
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10,
            fillColor: "#002836",
            fillOpacity: 1,
            strokeWeight: 6,
            strokeColor: "#dba349",
          });
          $('address').removeClass('expanded');
          $container.addClass('expanded');
          scrollToAddress($container);


          if (infowindow) {
            infowindow.close();
          }

          const tooltipContent = `
          <div class="tooltip-content poi-info-window gm-style">
            <div class="title">Eqlipse Location</div>
            <div class="address">
              <div class="address-line full-width">${$container.data('street_number')} ${$container.data('street_name')}</div>
              <div class="address-line full-width">${$container.data('city')}, ${$container.data('state')} ${$container.data('post_code')}</div>
              <div class="address-line full-width">${$container.data('country')}</div>
              <div class="view-link"><a href="https://www.google.com/maps?q=${encodeURIComponent($container.data('address'))}" target="_blank">View on Google Maps</a></div>
            </div>
          </div>`;


          infowindow = new google.maps.InfoWindow({
            content: tooltipContent
          });

          infowindow.open(map, targetMarker);


        }
      } else {
        // If the address is already expanded, collapse it and center the map back to its original state
        lockedMarker = null;
        centerMap(map);
        $('address').removeClass('expanded');
      }
    });
  });
})(jQuery);
