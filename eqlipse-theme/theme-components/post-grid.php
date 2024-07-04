<?php
$posts = $args['posts'];
$style = $args['style'] ?: null;
?>

<div class="related-post-container">
  <?php foreach ($posts as $post) :
    get_template_part('theme-components/post-card', null, array('style' => $style, 'taxonomy' => null));
  endforeach; ?>
</div>