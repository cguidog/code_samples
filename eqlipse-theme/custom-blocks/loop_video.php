<?php
global $pagenow;
$placeholder_image = get_field('placeholder_image');
$video_url = get_field('video_url');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if (is_array($placeholder_image) && $video_url) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section loop-video-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                                                                                                                            echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <?php if ($pagenow === 'post.php' || $pagenow === 'admin-ajax.php') : ?>
      <img src="<?php echo $placeholder_image['url']; ?>" width="<?php echo $placeholder_image['width']; ?>" height="<?php echo $placeholder_image['height']; ?>" />
    <?php else : ?>
      <video class="lazy loop-video" autoplay muted loop playsinline data-src=<?php echo $video_url; ?> <?php echo "data-poster=$placeholder_image[url]"; ?>>
        <source data-src=<?php echo $video_url; ?> type="video/mp4">
      </video>
    <?php endif; ?>
  </section>
<?php endif; ?>