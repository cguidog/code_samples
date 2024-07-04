<?php
global $pagenow;
$heading = get_field('section_heading');
$table_sections = get_field('table_sections');
$spacing = get_field('section_spacing');
$post_type = get_post_type();
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if (is_array($table_sections)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section spec-table-section <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null;                                                                                                                                                                               echo $bottom_spacing ? $bottom_spacing : null; ?>">
      <div class="accordion accordion-flush" id="spec-accordion-<?php echo $heading; ?>">
      <div class="accordion-item bg-navy-500">
    <?php if ($heading) : ?>
        <h2 class="display-51 <?php echo !empty($heading_transition) ? 'content__title ' : null;
                              echo $post_type === 'product' ? 'color-navy-50' : 'color-navy-300'; ?>" data-splitting data-effect1 id="item-heading-<?php echo $heading; ?>">
                              <span class="desktop-title"><?php echo $heading; ?></span>
                              <button class="accordion-button collapsed display-51 color-navy-50 bg-navy-500" type="button" data-bs-toggle="collapse" data-bs-target="#item-<?php echo $heading; ?>" aria-expanded="false" aria-controls="item-heading-<?php echo $heading; ?>">
                <?php echo $heading; ?>
              </button>
                            </h2>

      <?php endif;
    foreach ($table_sections as $section) : ?>
        <div id="item-<?php echo $heading; ?>" class="table accordion-collapse collapse" aria-labelledby="item-heading-<?php echo $heading; ?>" data-bs-parent="#<?php echo $heading; ?>">
          <?php if ($section['sub_heading']) : ?>
            <h3 class="body-21-bold color-navy-75"><?php echo $section['sub_heading']; ?></h3>
          <?php endif;
          if (is_array($section['specifications'])) : ?>
            <div>
              <ul>
                <?php foreach ($section['specifications'] as $spec) : ?>
                  <li class="color-navy-50"><?php echo $spec['specification']; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
                </div>
      </div>
  </section>
<?php endif; ?>