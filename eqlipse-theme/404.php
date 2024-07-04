<?php

/**
 * The template for displaying search results
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$fields = get_field('404_page', 'option');
$background_image = $fields['404_background_image'] ? backgroundImage($fields['404_background_image']) : null;
$background_video = $fields['404_background_video'] ?: null;
get_header();
?>
<main class="site-main section-404" id="main">
  <?php get_template_part('loop-templates/content', 'none', array('fields' => $fields, 'heading_size' => 90)); ?>
  <?php if ($background_image || $background_video) : ?>
    <div class="section-404-background" <?php echo $background_image; ?>>
      <?php if ($background_video) : ?>
        <video class="section-404-background-video" autoplay muted loop playsinline src=<?php echo $background_video; ?>>
          <source data-src=<?php echo $background_video; ?> type="video/mp4">
        </video>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</main>
<?php
get_footer();
