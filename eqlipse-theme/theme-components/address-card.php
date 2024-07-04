<?php
$address = $args && isset($args['address']) ? $args['address'] : null;
$phone_number = $args && isset($args['phone_number']) ? $args['phone_number'] : null;
$form_routing_id = get_field('form_routing_field_id', 'option')?: null;

if ($address) : ?>
  <address class="address-card" id="<?php echo $address['place_id'] ?>" 
    data-lat="<?php echo $address['lat']; ?>" 
    data-lng="<?php echo $address['lng']; ?>"
    data-place_id="<?php echo esc_attr($address['place_id']); ?>"
    data-address="<?php echo esc_attr($address['name']); ?>"
    data-street_number="<?php echo esc_attr($address['street_number']); ?>"
    data-street_name="<?php echo esc_attr($address['street_name']); ?>"
    data-city="<?php echo esc_attr($address['city']); ?>"
    data-state="<?php echo esc_attr($address['state_short']); ?>"
    data-post_code="<?php echo esc_attr($address['post_code']); ?>"
    data-country="<?php echo esc_attr($address['country']); ?>">
    <?php if ($address) : ?>
      <div class="address-container">
        <span class="body-16 color-navy-200">
          <?php echo $address['street_number'] . ' ' . ucwords($address['street_name_short']) . ' ' . ucwords(str_replace($address['street_number'] . ' ' . $address['street_name_short'], '', $address['name'])); ?>
          <br>
          <?php echo $address['city'] . ', ' . $address['state_short'] . ' ' . $address['post_code']; ?>
        </span>
        <!-- <button class="address-map-button" type="button" aria-label="<?php echo 'View the office at ' . $address['name'] . ' on map'; ?>" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>">
          <svg width="333" height="477" viewBox="0 0 333 477" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6979 243.235C22.6277 250.789 27.1195 258.003 32.118 264.823L162.254 474.169C164.21 477.316 168.79 477.316 170.746 474.169L300.883 264.823C305.881 258.003 310.372 250.789 314.302 243.236L315.07 242H314.938C326.488 219.338 333 193.68 333 166.5C333 74.5446 258.455 0 166.5 0C74.5446 0 0 74.5446 0 166.5C0 193.68 6.51245 219.338 18.062 242H17.9303L18.6979 243.235ZM241 166C241 207.421 207.421 241 166 241C124.579 241 91 207.421 91 166C91 124.579 124.579 91 166 91C207.421 91 241 124.579 241 166Z" />
            <circle cx="166" cy="166" r="70" fill="#dba349" />
          </svg>
        </button> -->
      </div>
      <div class="contact-info-container">
        <div>
          <?php if ($phone_number) : ?>
            <a class="body-16 color-navy-200" href="<?php echo 'tel:' . str_replace('-', '', $phone_number); ?>" aria-label="<?php echo 'Call ' . $phone_number; ?>"><?php echo $phone_number; ?></a>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </address>
<?php endif; ?>