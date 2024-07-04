<?php
global $pagenow;
$date = $args['date'];
$name = $args['name'];
$image = $args['image'];
$title = $args['title'];
$company = $args['company'];
?>
<div class="author-card">
  <?php if ($image) :
    if (is_array($image)) : ?>
      <img class="lazy author-card-image" src="<?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? $image['sizes']['thumbnail'] : null; ?>" data-src=<?php echo $image['sizes']['thumbnail']; ?> width=<?php echo $image['sizes']['thumbnail-width']; ?> height=<?php echo $image['sizes']['thumbnail-height']; ?> alt="<?php echo $image['alt']; ?>" />
  <?php else :
      echo $image;
    endif;
  endif; ?>
  <div>
    <?php if ($date) : ?>
      <time class="caption-12 color-navy-300"><?php echo date("F j, Y", strtotime($date)); ?></time>
    <?php endif;
    if ($name) : ?>
      <p class="body-21-bold color-navy-300"><?php echo $name; ?></p>
    <?php endif;
    if ($title) : ?>
      <p class="body-21 color-navy-200"><?php echo $title; ?></p>
    <?php endif;
    if ($company) : ?>
      <p class="body-21 color-navy-200"><?php echo $company; ?></p>
    <?php endif; ?>
  </div>
</div>