<?php
global $pagenow;
$heading = get_field('heading');
$heading_transition = get_field('heading_transition');
$heading_image = get_field('heading_image');
$quote = get_field('quote');
$text = get_field('text');
$links = get_field('links');
$layout = get_field('layout');
$scale_font = get_field('scale_font');
$text_size = $layout !== 'double' || get_field('text_size') ? 'display-38 ' : 'body-28 ';
$wide_heading = (get_field('wide_heading') && $layout === 'double') ? ' wide-heading' : null;
$post_type = get_post_type();
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$block_class = isset($block['className']) ? $block['className'] . ' ' : '';



$content_text_color = get_field('content_text_color') ?? 'default';
if($content_text_color == 'default') {
  $content_text_color = ($post_type == 'product') ? 'color-navy-75' : 'color-navy-100';
}
?>

<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section content-section<?php echo $wide_heading; ?> <?php echo $block_class; ?><?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                                                                                                                                                  echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <?php if ($heading_image && $layout === 'double') : ?>
    <div class="content-image-container">
      <img class="lazy content-image" src="<?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? $heading_image['sizes']['medium_large'] : null; ?>" data-src="<?php echo $heading_image['sizes']['medium_large']; ?>" width="<?php echo $heading_image['sizes']['medium_large-width']; ?>" height="<?php echo $heading_image['sizes']['medium_large-height']; ?>" alt="<?php echo $heading_image['alt']; ?>" />
    </div>
  <?php endif; ?>
  <div class="content-container <?php echo $layout == 'double' ? 'content-row' : 'content-column'; ?>">
    <div class="content-section-title-container">
      <?php if ($heading) : ?>
        <h2 class="display-51 <?php echo !empty($heading_transition) ? 'content__title ' : null; echo !empty($scale_font) ? 'scale__font ' : null;
                              echo $post_type === 'product' ? 'color-navy-50' : 'color-navy-300'; ?>" <?php echo !empty($heading_transition) ? 'data-splitting data-effect1' : null; ?>><?php echo $heading; ?></h2>
      <?php endif; ?>
    </div>
    <div class="content-section-text-container">
      <?php if ($quote) : ?>
        <p class="display-67 content__title <?php echo $post_type === 'product' ? 'color-navy-75' : 'color-navy-300'; ?>" data-splitting data-effect2><?php echo $quote; ?></p>
      <?php endif; ?>
      <?php if ($text) : ?>
        <div class="<?php echo $text_size;
                    echo $content_text_color; ?>"><?php echo $text; ?></div>
      <?php endif; ?>
      
      

      <?php if ($links) {

      $linkStyle = $links[0]['link_style'];

          if ($linkStyle === 'link-eqlipse') {
              //echo 'This is an Eqlipse link style';
              ?> <div class="content-section-link-container"> <?php
              foreach ($links as $link) {
                if (is_array($link)) {
                    ?>
                    <div class="content-section-links">
                        <?php get_template_part('theme-components/link', null, array('link' => $link)); ?>
                    </div>
                    <?php
                }
            }


          } elseif ($linkStyle === 'link-round-border') {
              //echo 'This is a Round Border link style';
              ?> <div class="content-section-rounded-link-container"> <?php
              foreach ($links as $link) {
                if (is_array($link)) {
                    ?>
                    <div class="content-section-links">
                        <?php get_template_part('theme-components/link', null, array('link' => $link)); ?>
                    </div>
                    <?php
                }
            }
          }
        }
      ?>

      
      
    </div>
  </div>
</section>