<?php

/**
 * Template Name: Eqlipse Leadership	
 *
 * Newsroom Template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main class="site-main" id="main" role="main">

	<?php
	echo get_template_part('theme-components/hero'); ?>
	<div class="facets-container">
		<section id="section-facets-container" class="section facets-container-section bio-facets static justify-content-end">
			<?php echo do_shortcode('[facetwp facet="bio_select"]'); ?>
		</section>
		<section class="section facets-results-section static">
			<?php echo do_shortcode('[facetwp template="bios"]'); ?>
		</section>
	</div>
	<?php wp_reset_query();
	the_content(); ?>
</main>
<?php
get_footer();
