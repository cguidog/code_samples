<?php
global $pagenow;
$items = get_field('items');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($items) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section big-text-accordion-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="accordion" id="big-text-accordion">
      <?php foreach ($items as $key => $item) :
        if ($item['tab_text'] && $item['content']) : ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="item-heading-<?php echo $key; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item-<?php echo $key; ?>" aria-expanded="false" aria-controls="item-heading-<?php echo $key; ?>">
                <?php echo $item['tab_text']; ?>
              </button>
            </h2>
            <div id="item-<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="item-heading-<?php echo $key; ?>" data-bs-parent="#big-text-accordion">
              <div class="accordion-body">
                <div class="display-38 color-navy-100 accordion-body-text-container">
                  <?php echo $item['content'];
                  if ($item['links']) :
                    foreach ($item['links'] as $link) :
                      if (is_array($link)) : ?>
                        <div class="content-section-links">
                          <?php get_template_part('theme-components/link', null, array('link' => $link)); ?>
                        </div>
                  <?php endif;
                    endforeach;
                  endif; ?>
                </div>
                <div class="accordion-body-image-container">
                  <?php if ($item['image']): ?>
                    <img class="lazy accordion-body-image" src="<?php echo $item['image']['sizes']['medium_large']; ?>"
                      width="<?php echo $item['image']['sizes']['medium_large-width']; ?>"
                      height="<?php echo $item['image']['sizes']['medium_large-height']; ?>"
                      alt="<?php echo $item['image']['alt']; ?>"
                      />
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>