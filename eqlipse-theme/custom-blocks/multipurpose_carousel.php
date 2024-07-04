<?php
global $pagenow;

$heading = get_field('heading') ?: null;
$content_type = get_field('content_type');
$slides = get_field($content_type);
$autoplay = get_field('autoplay') ?: false;
$interval = get_field('interval') ? get_field('interval') * 1000 : 5000;
$carousel_id = $heading ? strtolower(str_replace(' ', '_', $heading)) . '_carousel' : 'multipurpose_carousel';
$post_type = get_post_type();
$spacing = get_field('section_spacing') ?: null;
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if (is_array($slides)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section related-content-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                  echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <?php if ($heading) : ?>
      <h2 class="display-51 content__title <?php echo $post_type === 'product' ? 'color-navy-50' : 'color-navy-300'; ?>" data-splitting data-effect1><?php echo $heading; ?></h2>
    <?php endif; ?>
    <div id="<?php echo $carousel_id; ?>" class="owl-carousel <?php echo $content_type; ?>" <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'style="display:block;"' : null; ?> data-autoplay="<?php echo $autoplay; ?>" data-interval="<?php echo $interval; ?>">
      <?php get_template_part("theme-components/$content_type-slides", null, array('slides' => $slides)); ?>
    </div>
  </section>
<?php endif; ?>