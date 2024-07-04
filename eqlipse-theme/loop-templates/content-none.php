<?php

/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$fields = $args && $args['fields'] ? $args['fields'] : null;
$heading = $fields && $fields['no_results_heading'] ? $fields['no_results_heading'] : null;
$heading_size = $args && $args['heading_size'] ? $args['heading_size'] : null;
$text = $fields && $fields['no_results_text'] ? $fields['no_results_text'] : null;
$color = $fields && isset($fields['text_color']) ? $fields['text_color'] : 'navy';
$links = $fields && isset($fields['links']) ? $fields['links'] : null;
?>

<section class="no-results not-found">
  <?php if ($heading) : ?>
    <h1 class="search-section-heading color-<?php echo $color; ?> display-<?php echo $heading_size; ?>"><?php echo $heading; ?></h1>
  <?php endif; ?>
  <div class="no-results-content">
    <?php if ($text) : ?>
      <p class="no-results-message display-38 color-<?php echo $color; ?>"><?php echo  $text; ?></p>
    <?php endif; ?>
    <?php if (is_search()) : ?>
      <div class="search-form-container">
        <?php get_template_part('theme-components/search-form'); ?>
      </div>
    <?php else : ?>
      <?php if ($links) : ?>
        <div class="content-section-links">
          <?php
          foreach ($links as $link) :
            if (is_array($link)) :
              get_template_part('theme-components/link', null, array('link' => $link, 'color' => $color));
            endif;
          endforeach;
          ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>