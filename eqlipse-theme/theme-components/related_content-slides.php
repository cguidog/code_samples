<?php
$posts = $args['slides'];
$default_image = get_field('default_image', 'option');

foreach ($posts as $key => $post) :
  $reduced_font = strlen($post->post_title) >= 40 || hasLongWord($post->post_title) ? 'reduced-font' : null;
?>
  <div class="item">
    <a href=<?php echo $post->guid; ?> aria-label="<?php echo $post->post_title; ?>">
      <div class="post-slider_slide lazy multipurpose-slider" data-bg=<?php echo get_the_post_thumbnail_url($post->ID) ?: $default_image; ?> <?php echo backgroundImage(); ?>>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="slide_content">
          <h3 class="display-51 color-gold-50 <?php echo $reduced_font; ?>"><?php echo $post->post_title; ?></h3>
          <p class="body-21 color-gold-50">
            <?php echo $post->post_excerpt; ?>
          </p>
        </div>
      </div>
    </a>
  </div>
<?php endforeach; ?>