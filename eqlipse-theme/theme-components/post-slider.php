<?php
global $pagenow;
$posts = $args['posts'];
$overlay = get_field('image_overlay', 'option');
?>

<div class="d-flex post-slider">
  <?php foreach ($posts as $post) :
    $thumbnail = get_the_post_thumbnail_url($post->ID); ?>
    <a class="slide_content_link" aria-label="<?php echo $post->post_title; ?>" href=<?php echo $post->guid; ?>>
      <div class="post-slider_slide lazy" data-bg=<?php echo $thumbnail; ?> <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? backgroundImage($thumbnail) : backgroundImage(); ?>>
        <?php if ($overlay) : ?>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <?php endif; ?>
        <div class="slide_content">
          <h3 class="display-51 color-gold-50"><?php echo $post->post_title; ?></h3>
          <p class="body-21 color-gold-50">
            <?php echo $post->post_excerpt; ?>
          </p>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</div>