<?php
$category = $args && $args['taxonomy'] ? $args['taxonomy'] : null;
$overlay = get_field('image_overlay', 'option');
$style = $args ? $args['style'] : null;
$terms = $category ? get_the_terms(get_the_ID(), $category) : null;
$category = $terms ? $terms[0]->name : null;

?>
<a class="post-card-link" href=<?php the_permalink(); ?> aria-label="<?php the_title(); ?>">
  <div class="<?php echo $style === 'card_style_2' ? 'bg-cream-75 card-style-2' : 'bg-navy-50 card-style-1'; ?> post-card-post-container">
    
    <div class="post-slider_slide">
      <?php if ($overlay) : ?>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
        <div class="post-slider_slide-overlay"></div>
      <?php endif; ?>
      <?php the_post_thumbnail('medium-large'); ?>
    </div>

    <div class="post-card-post-title-date">
      <?php if ($terms) : ?>
        <span class="post-category"><?php echo $category; ?></span>
      <?php endif; ?>
      <div class="post-card-post-title-container stretch">
        <h2 class="<?php echo $style === 'card_style_2' ? 'body-21-bold' : 'body-21'; ?>  col-7"><?php the_title(); ?></h2>
        <div class="col-5">
          <!-- <span class="post-card-post-title-icon"></span> -->
          <span class="link-eqlipse-icon link-eqlipse body-21-bold"></span>
        </div>
      </div>
      <?php if(!get_field('post_hide_date')): ?><date><?php the_date(); ?></date><?php endif; ?>
    </div>
  </div>
</a>