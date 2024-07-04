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
	<main class="site-main dark" id="main">
		<?php
		get_template_part('theme-components/hero');
		the_content(); ?>
	</main>
</div>

<?php
get_footer();
