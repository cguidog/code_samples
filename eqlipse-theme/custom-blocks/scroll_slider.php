<?php
global $pagenow;

$posts = get_field('post_selection') ? get_field('post_selection') : null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($posts) : ?>

<section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section scroll-slider static<?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <div class="scroll-container">
    <div class="scroll-space">
      <div class="sticky-container">
        <div class="horizontal-container">
          <div class="scroll-slides-container">
            <?php foreach ($posts as $post): ?>
              <?php $thumbnail = get_the_post_thumbnail_url($post->ID); ?>
              <div class="scroll-slide">
                <a class="slide_content_link" aria-label="<?php echo $post->post_title; ?>" href=<?php echo get_permalink($post); ?>>
                  <div class="panel bg-navy" style='background-image:url("<?php echo $thumbnail; ?>");'>
                    <div class="post-slider_slide-overlay"></div>
                    <div class="post-slider_slide-overlay"></div>
                    <div class="post-slider_slide-overlay"></div>
                    <div class="post-slider_slide-overlay"></div>

                    <div class="panel-content">
                      <h3 class="display-51 color-gold-50"><?php echo $post->post_title; ?></h3>
                      <p class="body-21 color-gold-50"><?php echo $post->post_excerpt; ?></p>
                    </div>
                    <!-- /.panel-content -->
                  </div>
                </a>
              </div>
              <!-- /.scroll-slide -->
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php elseif ($pagenow === 'post.php' || $pagenow ===  'admin-ajax.php'): ?>
  <section class="empty-block"><b><u>Scroll Slider</u><br />Select Posts to Populate Block</b></section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
