<?php
global $pagenow;
$image = get_field('single_image');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$single_image_width = get_field('single_image_width') ?? 'default';

if ( $image ): ?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section single-image-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <img <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? "src='{$image['url']}'" : null; ?> class="single-image lazy image-width-<?php echo $single_image_width; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" data-src="<?php echo $image['url']; ?>"/>
</section>
<?php endif; ?>