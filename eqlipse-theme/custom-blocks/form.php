<?php
global $pagenow;
$form_id = isset($args) && isset($args['formID']) ? $args['formID'] : get_field('form_id');
$heading = isset($args) && isset($args['heading']) ? $args['heading'] : get_field('heading');
$description = isset($args) && isset($args['description']) ? $args['description'] : get_field('description');
$show_title = get_field('show_title') == 1 ? 'true' : 'false';
$spacing = get_field('section_spacing');
$remove_margins = get_field('remove_margins');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($form_id) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section form-section bg-navy-50 <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null;
                                                  echo $top_spacing ? $top_spacing : null;
                                                  echo $bottom_spacing && !$remove_margins ? $bottom_spacing : null;
                                                  echo  $remove_margins ? ' no-margins' : null; ?>">
    <div class="form-section-heading">
      <?php if ($heading) : ?>
        <h2 class="display-51 color-navy-100"><?php echo $heading; ?></h2>
      <?php endif; ?>
      <?php if ($description) : ?>
        <p class="body-21 color-navy-100"><?php echo $description; ?></p>
      <?php endif; ?>
    </div>
    <div class="form-section-form">
      <?php echo do_shortcode("[gravityform ajax='true' id=$form_id title=$show_title]"); ?>
    </div>
  </section>
<?php endif; ?>