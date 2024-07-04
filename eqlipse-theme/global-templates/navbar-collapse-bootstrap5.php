<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div id="navbar-overlay"></div>
<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="navbar-brand-toggler-container">
		<div class="navbar-brand-container">
			<!-- Your site branding in the menu -->
			<?php get_template_part('global-templates/navbar-branding'); ?>
		</div>
		<button id="navbar-toggler" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

	</div><!-- .container(-fluid) -->
	<div class="search-form-container">
		<?php get_template_part('theme-components/search-form'); ?>
	</div>

</nav><!-- #main-nav -->