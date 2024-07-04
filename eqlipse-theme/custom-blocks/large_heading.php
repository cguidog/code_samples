<?php
global $pagenow;
$heading = get_field('heading_text');
$reduced_font = $heading && strlen($heading) >= 40 ? 'reduced-font' : null;
$tag = get_field('heading_level');
$color = get_post_type() === 'product' ? 'color-navy-75' : null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ( $heading ): ?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section large-heading-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
<?php echo "<$tag class='display-213 content__title $color $reduced_font' data-splitting data-effect1>$heading</$tag>"; ?>
</section>
<?php endif; ?>