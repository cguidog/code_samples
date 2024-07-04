<?php
global $pagenow;
$events = get_field('events') ?: null;
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;
$visible = $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'visible' : null;
$limit_events = get_field('limit_events') && get_field('events_to_display') ? true : false;
$events_display = get_field('events_to_display');

if (is_array($events)) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section timeline-section static <?php echo $top_spacing ? $top_spacing : null;
                                                  echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <div class="timeline-events-container">
      <?php foreach ($events as  $key => $event) : ?>
        <div class="timeline-event" style="<?php echo $limit_events && $events_display <= $key ? 'display:none' : null; ?>">
          <div class="event-indicator-container"></div>
          <div class="event-details">
            <?php if ($event['date']) : ?>
              <time class="body-21-bold color-navy-100 <?php echo $visible; ?>"><?php echo $event['date']; ?></time>
            <?php endif; ?>
            <?php if ($event['heading']) :
              $heading = explode(' ', $event['heading']);
            ?>
              <h3 class="display-51 color-navy <?php echo $visible; ?>">
                <?php
                foreach ($heading as $word) :
                  echo '<span class="split-text">' . $word . '</span> '; ?>
                <?php endforeach; ?>
              </h3>
            <?php endif; ?>
            <?php if ($event['event_content']['text']) : ?>
              <div class="body-21 color-navy-200 event-content <?php echo $visible; ?>">
                <?php echo $event['event_content']['text']; ?>
              </div>
              <?php if ($event['event_link']['links']) :
                foreach ($event['event_link']['links'] as $link) :
                  if (is_array($link)) : ?>
                    <div class="content-section-links <?php echo $visible; ?>">
                      <?php get_template_part('theme-components/link', null, array('link' => $link)); ?>
                    </div>
              <?php endif;
                endforeach;
              endif; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach;
      if ($limit_events) : ?>
        <div class="timeline-load-more-container">
          <button class="timeline-load-more" aria-label="Load more events">Load more</button>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>