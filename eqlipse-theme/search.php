<?php

/**
 * The template for displaying search results
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$search_fields = get_field('search_results', 'option');
?>

<div>
  <main class="site-main search-section" id="main">
    <?php global $wp_query;
    if (have_posts()) : ?>
      <h1 class="search-section-heading display-120"><?php echo $search_fields && $search_fields['search_results_heading'] ? $search_fields['search_results_heading'] : 'Search Results'; ?></h1>
    <?php get_template_part('theme-components/post-list', null, array('posts' => $wp_query->posts));
    else :
      get_template_part('loop-templates/content', 'none', array('fields' => $search_fields, 'heading_size' => 120));
    endif; ?>
    <div class="search-pagination">
      <?php understrap_pagination(); ?>
    </div>
  </main>
</div>

<?php
get_footer();
