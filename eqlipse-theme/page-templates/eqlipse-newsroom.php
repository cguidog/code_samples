<?php

/**
 * Template Name: Eqlipse Newsroom
 *
 * Nesroom Template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$featured_post = get_field('post') ?: wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish'))[0];
$featured_title = !is_array($featured_post) ? $featured_post->post_title : $featured_post['post_title'];
$featured_thumbnail = !is_array($featured_post) ? get_the_post_thumbnail_url($featured_post->ID) : get_the_post_thumbnail_url($featured_post['ID']);
$featured_date = !is_array($featured_post) ? $featured_post->post_date : $featured_post['post_date'];
$featured_guid = !is_array($featured_post) ? $featured_post->guid : $featured_post['guid'];
$dark_mode = get_field('dark_mode');
?>

<main class="site-main" id="main" role="main">
	<?php
	echo get_template_part('theme-components/hero', null, array(
		'title'			=> $featured_title,
		'thumbnail' => $featured_thumbnail,
		'date'			=> $featured_date,
		'guid'			=> $featured_guid,
		'dark_mode'	=> $dark_mode,
	));
	?>
	<div class="facets-container">
		<section id="section-facets-container" class="section facets-container-section">
			<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
			<?php echo do_shortcode('[facetwp facet="newsroom_search"]'); ?>
		</section>
		<section class="section facets-results-section static">
			<?php echo do_shortcode('[facetwp template="blog_posts"]'); ?>
			<?php echo do_shortcode('[facetwp facet="load_more"]'); ?>
		</section>
	</div>
	<?php wp_reset_query();
	the_content(); ?>
</main>

<?php
get_footer();
