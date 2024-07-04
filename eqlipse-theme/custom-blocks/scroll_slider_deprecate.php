<?php
global $pagenow;

$posts = get_field('post_selection') ? get_field('post_selection') : null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($posts) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section scroll-slider static<?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
  <div class="panels">
  <?php foreach ($posts as $post): ?>
    <?php $thumbnail = get_the_post_thumbnail_url($post->ID); ?>
    <div class="panel">
        <div class="panel-inner" style='background-image:url("<?php echo $thumbnail; ?>");'>
          <div class="panel-content">
            <h3 class="display-51 color-gold-50"><?php echo $post->post_title; ?></h3>
            <p class="body-21 color-gold-50"><?php echo $post->post_excerpt; ?></p>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
  </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php //get_template_part('theme-components/post-slider', null, array('posts' => $posts)); ?>