<?php

/**
 * Template Name: Eqlipse Full Width
 *
 * Default Template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6N69W8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<main class="site-main" id="main" role="main">

	<?php echo is_front_page() ? get_template_part('theme-components/homepage-hero') : get_template_part('theme-components/hero');
	the_content();
	?>
</main>

<?php
get_footer();
