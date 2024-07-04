<?php
global $pagenow;
$images = get_field('images');
$reverse_order = get_field('reverse_order') ? ' flex-row-reverse' : null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ( $images ): ?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section static image-grid-section <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; echo $reverse_order; ?>">
  <?php foreach( $images as $image ): ?>
    <div class="img lazy image-grid-image">
    <img class="lazy" src="<?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? $image['image']['url'] : null; ?>" data-src=<?php echo $image['image']['url']; ?> alt="<?php echo $image['image']['alt']; ?>" width=<?php echo $image['image']['width']; ?> height=<?php echo $image['image']['height']; ?> />
  </div>
  <?php endforeach; ?>
</section>
<?php endif; ?>