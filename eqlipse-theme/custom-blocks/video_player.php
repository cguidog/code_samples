<?php
global $pagenow;
$video_url = get_field('video_url');
$video_title = get_field('video_title');
$alt_thumbnail = get_field('alternative_thumbnail') ?: null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($video_url && $video_title) :
  $thumbnail = $alt_thumbnail ?: get_video_thumbnail_uri($video_url);?>

  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section video-player-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                        echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="video-player-container position-relative">
      <button data-id=<?php echo get_video_embed($video_url); ?> class="video-player-trigger position-absolute top-50 start-50 translate-middle" style="z-index:1;" aria-label="Play video: <?php echo $video_title; ?>">
        <svg class="video-trigger-icon" xmlns="http://www.w3.org/2000/svg" width="176" height="176" viewBox="0 0 176 176" fill="none">
          <path d="M73.3332 121.001L117.333 88.0013L73.3332 55.0013V121.001ZM87.9998 14.668C47.5198 14.668 14.6665 47.5213 14.6665 88.0013C14.6665 128.481 47.5198 161.335 87.9998 161.335C128.48 161.335 161.333 128.481 161.333 88.0013C161.333 47.5213 128.48 14.668 87.9998 14.668ZM87.9998 146.668C55.6598 146.668 29.3332 120.341 29.3332 88.0013C29.3332 55.6613 55.6598 29.3346 87.9998 29.3346C120.34 29.3346 146.667 55.6613 146.667 88.0013C146.667 120.341 120.34 146.668 87.9998 146.668Z" />
        </svg>
      </button>
      <img src="<?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? $thumbnail : null; ?>" data-src=<?php echo $thumbnail; ?> class="lazy video-player-thumbnail" width="1280" height="720" alt="<?php echo $video_title; ?>" />
    </div>
  </section>
<?php endif; ?>