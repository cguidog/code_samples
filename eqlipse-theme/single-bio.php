<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div id="single-wrapper">
	<main class="site-main" id="main">
		<article class="single-bio-container">
		<?php get_template_part('theme-components/bio-header'); ?>
			<div>

			</div>
			<div class="single-bio-content-container">
				<div class="section single-bio-content color-navy-200 body-28">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	</main>
</div>

<?php
get_footer();
