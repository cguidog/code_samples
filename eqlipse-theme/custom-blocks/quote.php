<?php
global $pagenow;
$quote = get_field('testimonial');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section quote-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <?php get_template_part('theme-components/quote', null, array(
    'quote' => $quote['quote'],
    'class' => 'color-navy-200',
  ));
  get_template_part('theme-components/author-card', null, array(
    'date'    => null,
    'name'    => $quote['name'] ?: null,
    'image'   => $quote['photo'] ?: null,
    'title'   => $quote['title'] ?: null,
    'company' => $quote['company'] ?: null,
  ));
  ?>
</section>