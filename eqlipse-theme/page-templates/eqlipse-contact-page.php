<?php

/**
 * Template Name: Eqlipse Contact Page
 *
 * Default Template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$locations = get_field('locations', 'option');
$map_id = get_field('map_id', 'option') ?: null;
$form_id = get_field('form_id', 'option') ?: null;
?>
<main class="site-main" id="main" role="main">
	<?php if ($locations) : ?>
		<section class="section static locations-section">
			<div class="location-details-container">
				<div class="office-directory">
					<?php foreach ($locations as $location) :
						get_template_part('theme-components/location-details', null, array('location' => $location));
					endforeach; ?>
				</div>
			</div>
			<div class="location-map-container">
				<div class="acf-map" data-zoom="16" data-map_id=<?php echo $map_id; ?>>
				<?php foreach ($locations as $location) :
					foreach ($location['offices'] as $key => $office) : ?>
						<div class="marker"
							data-lat="<?php echo esc_attr($office['address']['lat']); ?>"
							data-lng="<?php echo esc_attr($office['address']['lng']); ?>"
							data-place_id="<?php echo esc_attr($office['address']['place_id']); ?>"
							data-address="<?php echo esc_attr($office['address']['name']); ?>"
							data-street_number="<?php echo esc_attr($office['address']['street_number']); ?>"
							data-street_name="<?php echo esc_attr($office['address']['street_name']); ?>"
							data-city="<?php echo esc_attr($office['address']['city']); ?>"
							data-state="<?php echo esc_attr($office['address']['state_short']); ?>"
							data-post_code="<?php echo esc_attr($office['address']['post_code']); ?>"
							data-country="<?php echo esc_attr($office['address']['country']); ?>">
						</div>
					<?php endforeach;
				endforeach; ?>
				</div>
				<div class="contact-form-container">
					<button class="close-button" aria-label="Close Form">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="CloseOutlined">
								<path id="Vector" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" />
							</g>
						</svg>
					</button>
					<?php if (get_field('form_id', 'option')) :
						gravity_form($form_id, false, false, false, '', true);
					endif; ?>
				</div>
			</div>
		</section>
	<?php endif;
	get_template_part('custom-blocks/form', null, array('formID' => 4,
'heading' => 'Contact Us'));
	?>
</main>

<?php
get_footer();
