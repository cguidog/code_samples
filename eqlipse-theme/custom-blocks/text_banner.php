<?php
global $pagenow;
$text_banner_header = get_field('text_banner_header');
$text_banner_subheader = get_field('text_banner_subheader');
$text_banner_link = get_field('text_banner_link');
$text_banner_btn = get_field('text_banner_btn') ?: "Learn More";


$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
?>
<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section text-banner text-banner-section bg-navy-50 margin-no-lr static <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <div class="text-banner__inner">
    <?php if($text_banner_header) echo "<h2 class='display-120 color-navy-100'>$text_banner_header</h2>"; ?>
    <?php if($text_banner_subheader) echo "<h3 class='display-38'>$text_banner_subheader</h3>"; ?>
    <?php if ($text_banner_link): ?>
      <div class="content-section-links">
        <a href='<?php echo $text_banner_link; ?>' class='link-eqlipse body-21-bold'>
          <?php echo $text_banner_btn; ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
