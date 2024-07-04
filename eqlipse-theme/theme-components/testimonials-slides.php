<?php
$testimonials = $args['slides'];

foreach ($testimonials as $key => $testimonial) :
  if ($testimonial['testimonial']['quote']) : ?>
    <div class="item testimonial">
      <?php get_template_part('theme-components/quote', null, array(
        'quote' => $testimonial['testimonial']['quote'],
        'class' => 'color-navy-200',
      ));
      get_template_part('theme-components/author-card', null, array(
        'date'    => null,
        'name'    => $testimonial['testimonial']['name'] ?: null,
        'image'   => $testimonial['testimonial']['photo'] ?: null,
        'title'   => $testimonial['testimonial']['title'] ?: null,
        'company' => $testimonial['testimonial']['company'] ?: null,
      ));
      ?>
    </div>
<?php endif;
endforeach; ?>