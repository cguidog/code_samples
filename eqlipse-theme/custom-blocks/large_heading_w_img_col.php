<?php
global $pagenow;

$heading = get_field('heading_text');
$tag = get_field('heading_level');
$color = get_post_type() === 'product' ? 'color-navy-75' : null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$image = get_field('single_image');
$img_spacing = get_field('img_section_spacing');
$img_position = get_field('image_position');
?>

<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section large-heading-with-image-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; ?> <?php echo $bottom_spacing ? $bottom_spacing : null;?> <?php echo $img_position ?>">
  <?php if ($image) : ?>
    <div class="large-heading-with-image-image-container">
      <img <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? "src='{$image['url']}'" : null; ?> class="single-image lazy" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" data-src="<?php echo $image['url']; ?>" />
    </div>
  <?php endif; ?>
  <?php if ($heading) : ?>
    <div class="large-heading-with-image-heading-container">
      <?php echo "<$tag class='display-120 $color content__title' data-splitting data-effect1>$heading</$tag>"; ?>
    </div>
  <?php endif; ?>
</section>