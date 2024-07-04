<?php
$heading = get_field('hero_heading');
$heading_image = get_field('heading_image');
$quote = explode(' ', get_field('hero_quote'));
$image = get_field('hero_image');
$video = get_field('hero_video');
?>
<section class="homepage-hero hero-observer">
  <div class="homepage-hero-video-quote">
    <div class="homepage-hero-video-quote-container">
      <?php if ($quote) : ?>
        <div class="display-67 color-cream-75 homepage-hero-video-quote-container-quote">
          <?php foreach ($quote as $word) :
            echo '<span>' . $word . '</span> ';
          endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if ($video) : ?>
    </div>
    <video class="lazy homepage-hero-video-quote-video" autoplay muted loop playsinline data-src=<?php echo $video; ?> <?php echo $image ? "data-poster=$image" : null; ?>>
      <source data-src=<?php echo $video; ?> type="video/mp4">
    </video>
  </div>
<?php elseif ($image) : ?>
  </div>
  <div class="homepage-hero-video-quote-video still-image" <?php echo !$video && $image ? backgroundImage($image) : null; ?>>
  </div>
  </div>
<?php endif; ?>
<div class="homepage-hero-overlay">
  <?php if ($heading) : ?>
    <?php if (get_field('image_heading') && $heading_image) : ?>
      <h1 class="homepage-hero-container-heading-image bg-navy" aria-label="<?php echo $heading; ?>">
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1493.8 383.7">
          <defs>
            <style>
              .cls-1 {
                fill: #fffef8;
                stroke-width: 0px;
              }
            </style>
          </defs>
          <g id="Layer_1-2" data-name="Layer 1">
            <g>
              <polygon class="cls-1" points="84.1 183.3 175.2 183.3 175.2 121.2 83.9 121.2 84.1 61.9 198.2 62.1 198.2 0 0 0 0 305.5 198.2 305.5 198.2 243.3 84.1 243.3 84.1 183.3" />
              <path class="cls-1" d="m479.6,84.2c-7.9-19.7-18.6-36.1-32.2-49.4-13.5-13.3-29.2-23.2-47-29.8-5.1-1.9-10.3-3.6-15.6-5h-82.3c-5.3,1.4-10.5,3-15.6,5-17.7,6.6-33.3,16.6-47,29.8-13.5,13.3-24.2,29.7-32.1,49.3-7.7,19.6-11.6,42.4-11.6,68.3s3.9,48.6,11.8,68.3c7.9,19.7,18.6,36.3,32.3,49.7,13.7,13.4,29.3,23.5,47,30.2,6,2.3,12.1,4.2,18.4,5.7.7,12.6,3.6,23.4,9,32.2,6.1,10.1,13.7,18.1,22.8,24,9.2,6.1,18.6,10.6,28.2,13.7,9.7,3,18.1,5,25.3,6s11.7,1.5,13.7,1.5l23.2-55.3c-2.1-.3-5.9-.8-11.4-1.7-5.5-.8-11.4-2.2-17.6-4.1s-11.6-4.7-16.2-8.3c-2.6-2-4.3-4.3-5.4-7,7.6-1.6,15.1-3.8,22.4-6.6,17.8-6.8,33.5-16.8,47.2-30.2,13.8-13.4,24.6-30,32.5-49.7,7.9-19.7,11.8-42.5,11.8-68.3s-3.9-48.7-11.6-68.3Zm-82.8,124.8c-6.1,13.7-13.9,23.3-23.6,29-9.5,5.5-19.4,8.3-29.6,8.3s-19.9-2.8-29.6-8.3c-9.5-5.7-17.4-15.3-23.6-28.8-6.2-13.7-9.3-32.6-9.3-56.7s3.1-42.9,9.3-56.3c6.2-13.5,14.1-23,23.6-28.4,9.7-5.5,19.5-8.3,29.6-8.3s20.1,2.8,29.6,8.3c9.5,5.4,17.4,14.8,23.6,28.4,6.2,13.4,9.3,32.2,9.3,56.3.1,24-3,42.8-9.3,56.5Z" />
              <polygon class="cls-1" points="587.3 0 503.6 0 503.6 305.5 696.2 305.5 696.2 239 587.3 239 587.3 0" />
              <rect class="cls-1" x="706.6" y="0" width="82.4" height="305.5" />
              <path class="cls-1" d="m986.3,13.9C969,4.7,948.8,0,925.6,0h-117v305.5h83.7v-91.9h33.3c23.2,0,43.4-4.8,60.7-14.5,17.3-9.8,30.7-22.8,40.2-39.1,9.5-16.4,14.3-34.7,14.3-54.7s-4.8-38-14.3-53.8c-9.6-16-23-28.5-40.2-37.6Zm-35.2,117.2c-3.7,6.9-8.6,12.1-14.7,15.5-5.9,3.3-12.4,5-19.3,5h-24.9V62.1h24.9c6.9,0,13.3,1.4,19.3,4.3,6.1,2.8,11,7.3,14.7,13.7s5.6,14.7,5.6,25.1-1.9,19-5.6,25.9Z" />
              <path class="cls-1" d="m1238.7,147.1c-13.9-7.9-30.2-15-48.7-21.5-12.3-4.4-23.3-8.6-33.1-12.4-9.7-3.9-17.2-8-22.8-12.4-5.5-4.6-8.3-9.8-8.3-15.7,0-8.4,3.2-14.8,9.7-19.3,6.6-4.4,16-6.6,28.2-6.6s20.9,3.1,25.9,9.3c5.1,6.2,7.7,13.8,7.7,22.8v6.4h83.5v-10.4c0-20.2-5.2-37.1-15.5-50.7s-24.4-24-42.2-31.1c-5.3-2.1-10.8-3.9-16.6-5.4h-86c-5.8,1.5-11.5,3.4-16.9,5.6-17.7,7.2-31.8,17.5-42.2,31.1-10.5,13.4-15.7,29.5-15.7,48.5s4.1,33.8,12.2,46.2c8.1,12.3,18.6,22.3,31.5,30,13,7.7,26.6,13.9,41,18.4,13.2,4.1,25.3,8.5,36,13,10.9,4.6,19.5,9.4,25.9,14.5,6.5,5.1,9.7,10.6,9.7,16.6,0,8-3.5,13.8-10.3,17.4-6.8,3.5-16.1,5.2-28,5.2s-21.5-3.2-27.5-9.7c-5.9-6.5-8.9-14.6-8.9-24.2v-9.2h-83.5v10.8c0,21.3,5.2,39.1,15.5,53.4,10.5,14.4,24.7,25.2,42.7,32.5,17.9,7.2,38.2,10.8,60.9,10.8s43.8-3.5,61.9-10.4c18.2-6.9,32.5-17,42.9-30.2,10.3-13.4,15.5-29.7,15.5-48.9s-3.9-33.4-11.8-45.1c-7.9-11.9-18.7-21.6-32.7-29.3Z" />
              <polygon class="cls-1" points="1295.6 305.5 1493.8 305.5 1493.8 243.3 1379.7 243.3 1379.7 183.3 1470.8 183.3 1470.8 121.2 1379.7 121.2 1379.7 62.1 1493.8 62.1 1493.8 0 1295.6 0 1295.6 305.5" />
            </g>
          </g>
        </svg>
      </h1>
    <?php else : ?>
      <h1 class="homepage-hero-container-heading color-cream-75"><?php echo $heading ?></h1>
    <?php endif; ?>
  <?php endif; ?>
</div>
</section>