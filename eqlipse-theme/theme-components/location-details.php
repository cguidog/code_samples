<?php
$location = $args && isset($args['location']) ? $args['location'] : null;
//'phone_number'  => $office['phone_number'],
?>

<div class="location-details">
  <?php if ($location['state']) : ?>
    <h2 class="display-38-bold color-navy"><?php echo $location['state']; ?></h2>
    <?php if (is_array($location['offices'])) :
      foreach ($location['offices'] as $office) : ?>
        <div class="office-container">
          <?php get_template_part('theme-components/address-card', null, array(
            'address'       => $office['address'],
          )); ?>
        </div>
    <?php endforeach;
    endif; ?>
  <?php endif; ?>
</div>