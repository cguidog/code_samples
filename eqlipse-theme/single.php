<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$author = get_field('author') ?: null;
$author_ID = get_post_author($post->ID);
$author_name = $author ? $author->post_title : 'Eqlipse Newsroom';
$author_image = $author ? get_the_post_thumbnail($author->ID, 'thumbnail', array('class' => 'author-card-image')) : null;
$related_posts = get_field('related_posts') ?: null;
$args = $related_posts && $related_posts['display_related_posts'] && $related_posts['source'] === 'taxonomy' ? queryBuilder('post', 'category', get_the_terms($post->ID, 'category')[0]->term_id, 3, $post->ID) : null;
$query = $args ? new WP_Query($args) : null;
$related_posts_array = $query ? $query->posts : ($related_posts && $related_posts['source'] === 'manual' ? $related_posts['posts'] : null);
?>

<div id="single-wrapper">
	<main class="site-main single-main" id="main">
		<?php get_template_part('theme-components/hero'); ?>
		<div style="margin-left: 24px;"><a class="body-21 color-navy" href="/newsroom/" style="vertical-align: middle; font-weight: 900;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-top:-4px;">
					<path d="M4 8H8V4H4V8ZM10 20H14V16H10V20ZM4 20H8V16H4V20ZM4 14H8V10H4V14ZM10 14H14V10H10V14ZM16 4V8H20V4H16ZM10 8H14V4H10V8ZM16 14H20V10H16V14ZM16 20H20V16H16V20Z" fill="#002836" />
				</svg> Back</a></div>
		<article class="single-post-container">
			<?php get_template_part('theme-components/author-card', null, array(
				'date'		=> $post->post_date,
				'name' 		=> $author_name,
				'image' 	=> $author_image,
				'title' 	=> null,
				'company'	=> null,
			)); ?>
			<div class="single-post-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php if ($related_posts && $related_posts['display_related_posts'] && is_array($related_posts_array)) : ?>
			<section class="section related-post-section">
				<h2 class="color-navy-300 display-51">Related</h2>
				<div class="related-post-container">
					<?php foreach ($related_posts_array as $post) :
						get_template_part('theme-components/post-card');
					endforeach; ?>
				</div>
			</section>
		<?php endif;
		get_template_part('custom-blocks/form', null, array(
			'formID' => 1,
			'heading' => 'Join our Newsletter'
		));
		?>

	</main>
</div>

<?php
get_footer();
