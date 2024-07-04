<?php
global $pagenow;
$links = get_field('links');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ( $links ): ?>
<div class="page-navigation-wrapper">
  <nav <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="page-navigation page-navigation-initial <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php the_field('background_mode'); ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <?php foreach ($links as $key => $link): 
      if ($link['link_target'] && $link['link_text']): ?>
      <a class="page-navigation_link body-21 color-navy-100 <?php echo $key == 0 ? 'active' : null ?>" href="#<?php echo $link['link_target']; ?>" data-link-text="<?php echo htmlspecialchars($link['link_text'], ENT_QUOTES); ?>" <?php echo $link['aria_label'] ? "arial-label='$link[aria_label]'" : null; ?>><?php echo $link['link_text']; ?></a>
      <?php endif;
    endforeach; ?>
  </nav>
</div>
<?php endif; ?>