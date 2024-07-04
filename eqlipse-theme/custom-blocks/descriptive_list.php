<?php
global $pagenow;
$post_type = get_post_type();
$editor = $post_type === 'product' && $pagenow !== 'post.php' ? true : false; 
$image = get_field('image');
$items = get_field('items');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if (is_array($items)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section descriptive-list-section <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php'  ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                            echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="descriptive-list-section-image-container">
      <?php if ($image) : ?>
        <img class="lazy" <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? backgroundImage($image['sizes']['medium_large']) : null; ?> data-src=<?php echo $image['sizes']['medium_large']; ?> width=<?php echo $image['sizes']['medium_large-width']; ?> height=<?php echo $image['sizes']['medium_large-height']; ?> alt="<?php echo $image['alt']; ?>" />
      <?php endif; ?>
    </div>
    <div class="descriptive-list-section-content-container">
      <?php foreach ($items as $item) : ?>
        <div class="descriptive-list-item <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? 'edit' : null; ?>">
          <div class="descriptive-list-item-heading">
            <h3 class="display-51 <?php echo $editor ? 'color-navy-50': 'color-navy-200'; ?>"><?php echo $item['heading']; ?></h3>
          </div>
          <div class="descriptive-list-item-content">
            <?php if ($item['image']) : ?>
              <img class="lazy" <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? backgroundImage($item['image']['sizes']['medium_large']) : null; ?> data-src=<?php echo $item['image']['sizes']['medium_large']; ?> width=<?php echo $item['image']['sizes']['medium_large-width']; ?> height=<?php echo $item['image']['sizes']['medium_large-height']; ?> alt="<?php echo $item['image']['alt']; ?>" />
            <?php endif; ?>
            <p class="<?php echo $editor ? 'color-navy-75': 'color-navy-200'; ?>">
              <?php
              $words = explode(' ', $item['content']);
              foreach ($words as $word) :
                echo '<span class="split-text">' . $word . '</span> ';
              endforeach;
              ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>