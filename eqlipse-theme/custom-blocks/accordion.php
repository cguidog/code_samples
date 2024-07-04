<?php
global $pagenow;
$accordion_ID = get_field('accordion_id');
$items = get_field('items');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if (is_array($items)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section accordion-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="accordion accordion-flush" id=<?php echo $accordion_ID; ?>>
      <?php foreach ($items as $key => $item) :
        if ($item['tab_text'] && $item['content']) : ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="item-heading-<?php echo $key; ?>">
              <button class="body-21-bold color-navy-200 accordion-button <?php echo $key != 0 ? 'collapsed' : null; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#item-<?php echo $key; ?>" aria-expanded="false" aria-controls="item-heading-<?php echo $key; ?>">
                <?php echo $item['tab_text']; ?>
              </button>
            </h2>
            <div id="item-<?php echo $key; ?>" class="accordion-collapse collapse <?php echo $key == 0 ? 'show' : null; ?>" aria-labelledby="item-heading-<?php echo $key; ?>" data-bs-parent="#<?php echo $accordion_ID; ?>">
              <div class="accordion-body">
                <?php if (!empty($item['content']['image'])): ?>
                  <div class="accordion-body-image">
                  <img <?php echo $pagenow === 'post.php' || $pagenow === 'admin-ajax.php' ? "src='{$item['content']['image']['url']}'" : null; ?> class="lazy" alt="<?php echo $item['content']['image']['alt']; ?>" width="<?php echo $item['content']['image']['width']; ?>" height="<?php echo $item['content']['image']['height']; ?>" data-src="<?php echo $item['content']['image']['url']; ?>"/>
                  </div>
                <?php endif; ?>
                <?php if (isset($item['content']['text'])): ?>
                  <div class="accordion-body-text body-21">
                    <?php echo $item['content']['text']; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>