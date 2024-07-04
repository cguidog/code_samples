<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$heading = get_field('heading', 'option');
$quote = get_field('quote', 'option');
$text = get_field('text', 'option');
$links = get_field('links', 'option');
?>

<footer class="bg-navy-300">
	<div class="static section footer-content-section">
		<div class="footer-top-left col-12 col-lg-3 col-xl-4">
			<?php if ($heading) : ?>
				<h2 class="display-51 color-gold-300"><?php echo $heading; ?></h2>
			<?php endif; ?>
		</div>
		<div class="footer-top-right col-12 col-lg-9 col-xl-8">
			<?php if ($quote) : ?>
				<p class="display-67 color-navy-50"><?php echo $quote; ?></p>
			<?php endif;
			if ($text) : ?>
				<div class="display-38 color-navy-50"><?php echo $text; ?></div>
			<?php endif;
			if ($links) : ?>
				<div class="footer-links-container">
					<?php foreach ($links as $link) :
						if (is_array($link)) :
							get_template_part('theme-components/link', null, array(
								'link' => $link,
								'class' => 'footer-links',
							));
						endif;
					endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="footer-quick-links-container">
		<?php dynamic_sidebar( 'footer_quick_links' ); ?>
	</div>
	<div class="footer-links">
		<div class="copy-terms-social-container">
			<div class="copy-terms">
				<div>
					<span>&copy;<?php echo date('Y'); ?> <span>Eqlipse</span></span>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer',
						'menu_class'			=> 'footer-terms',
					)
				);
				?>
			</div>
			<?php get_template_part('theme-components/social-media-platforms'); ?>
		</div>
	</div>
</footer>
<?php // Closing div#page from header.php. 
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>