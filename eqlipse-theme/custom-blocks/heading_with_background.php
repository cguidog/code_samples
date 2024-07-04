<?php
global $pagenow;
$heading = get_field('heading_text');
$reduced_font = strlen($heading) >= 25 ? 'reduced-font' : null;
$tag = get_field('heading_level');
$color = get_field('text_color');
$background_image = get_field('background_image');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section heading-background-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                                                                                                                                  echo $bottom_spacing ? $bottom_spacing : null; ?>" <?php echo $background_image ? backgroundImage($background_image) : null; ?>>
  <?php if ($heading) : ?>
    <div class="heading-container">
      <?php echo "<$tag class='display-213 content__title $color $reduced_font' data-splitting data-effect1>$heading</$tag>"; ?>
    </div>
  <?php endif; ?>
</section>