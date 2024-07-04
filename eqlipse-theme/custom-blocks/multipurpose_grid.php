<?php
global $pagenow;
$cards = get_field('items');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$post_type = get_post_type();
$editor = $pagenow === 'admin-ajax.php' || $pagenow === 'post.php' || $post_type !== 'product' ? true : false;


if (is_array($cards)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section multipurpose-grid-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;
                                                                                                                                                echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="multipurpose-grid-cards-container">
      <?php foreach ($cards as $card) : ?>
        <div class="card-container">
          <div class="card">
            <?php if ($card['image']) : ?>
              <img <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? "src='{$card['image']['sizes']['large']}'" : null; ?> data-src=<?php echo $card['image']['sizes']['large']; ?> width=<?php echo $card['image']['sizes']['large-width']; ?> height=<?php echo $card['image']['sizes']['large-height']; ?> class="card-img-top lazy" alt=<?php echo $card['image']['alt']; ?>>
            <?php endif; ?>
            <div class="card-body">
              <?php if ($card['heading']) : ?>
                <h5 class="card-title display-51 <?php echo $editor ? 'color-navy-200' : 'color-navy-50'; ?>"><?php echo $card['heading']; ?></h5>
              <?php endif; ?>
              <?php if ($card['sub_heading']) : ?>
                <h6 class="body-28 <?php echo $editor ? 'color-navy-300' : 'color-navy-75'; ?>"><?php echo $card['sub_heading']; ?></h6>
              <?php endif;
              $items = $card['specifications'];

              if (is_array($items)) :
                foreach ($items as $item) :
                  get_template_part('theme-components/multi-grid-card', null, array(
                    'item'   => $item,
                    'editor' => $editor
                  ));
                endforeach;
              endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if (checkArrayAsValue($cards, 'additional_specifications')) : ?>
      <button class="btn btn-primary body-21-bold <?php echo $editor ? 'color-navy-300' : 'color-navy-50'; ?> multi-grid-collapse-trigger collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#multi-grid-collapse" aria-expanded="false" aria-controls="multi-grid-collapse">
        <?php the_field('accordion_label'); ?>
        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <g id="Group 82">
            <path class="collapsed" id="Line 9" d="M12 1L12 23" stroke-linecap="round" />
            <path id="Line 10" d="M1 12L23 12" stroke-linecap="round" />
          </g>
        </svg>
      </button>
      <div class="bottom-grid">
        <div class="collapse" id="multi-grid-collapse">
          <div class="multipurpose-grid-cards-container">
            <?php foreach ($cards as $card) : ?>
              <div class="card-container">
                <div class="card">
                  <div class="card-body">
                    <?php
                    $add_items = $card['additional_specifications'];
                    if (is_array($add_items)) :
                      foreach ($add_items as $item) :
                        get_template_part('theme-components/multi-grid-card', null, array(
                          'item'   => $item,
                          'editor' => $editor
                        ));
                      endforeach;
                    endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>
<?php endif; ?>