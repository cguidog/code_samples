<?php
$overlay = get_field('image_overlay', 'option');
?>
<a class="post-card-link bio-card" href=<?php the_permalink(); ?> aria-label="<?php the_title(); ?>">
  <div class=" post-card-post-container">
    <div class="post-slider_slide">
      <?php the_post_thumbnail('card-thumbnail'); ?>
    </div>
    <div class="post-card-post-title-container">
      <h2 class="display-38"><?php the_title(); ?></h2>
      <span class="body-16 color-navy-100"><?php the_field('profile_title'); ?></span>
    </div>
  </div>
</a>