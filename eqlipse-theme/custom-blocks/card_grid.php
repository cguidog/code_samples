<?php
global $pagenow;
$cards = get_field('cards');
$spacing = get_field('section_spacing');
$columns = get_field('columns') ?: null;
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$post_type = get_post_type();
$editor = $post_type === 'product' && $pagenow !== 'post.php' && $pagenow !== 'admin-ajax.php' ? true : false; 

if (is_array($cards)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section card-grid-section static <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; echo $columns !== null ? ' grid-columns-'. $columns : ' grid-columns-3'; ?>">
    <?php foreach ($cards as $card) : ?>
        <div class="card <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? 'edit' : null; ?>">
          <?php if ($card['image']) : ?>
            <img <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? "src='{$card['image']['sizes']['medium_large']}'" : null; ?> data-src=<?php echo $card['image']['sizes']['medium_large']; ?> width=<?php echo $card['image']['sizes']['medium_large-width']; ?> height=<?php echo $card['image']['sizes']['medium_large-height']; ?> class="card-img-top lazy" alt=<?php echo $card['image']['alt']; ?>>
          <?php endif; ?>
          <div class="card-body">
            <?php if ($card['heading']) : ?>
              <p class="card-title body-21-bold <?php echo $editor ? 'color-navy-50': 'color-navy'; ?>"><?php echo $card['heading']; ?></p>
            <?php endif; ?>
            <?php if ($card['content']) : ?>
              <p class="card-text body-16 <?php echo $editor ? 'color-navy-50': 'color-navy-200'; ?>">
                <?php
                $words = explode(' ', $card['content']);
                foreach ($words as $word) :
                  echo '<span class="split-text">'.$word.'</span> ';
                endforeach;?>
                </p>
            <?php endif; ?>
          </div>
        </div>
    <?php endforeach; ?>
  </section>
<?php endif; ?>