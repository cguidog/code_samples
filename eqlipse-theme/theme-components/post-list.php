<?php
$posts = $args['posts'];
?>

<div class="post-list-group">
  <?php
  ?>
  <?php foreach ($posts as $post) : ?>
    <a class="post-list-item" href=<?php echo $post->guid; ?>>
      <span class="body-28 color-navy-200"><?php echo $post->post_title; ?></span>
      <?php if (in_array($post->post_type, ['event', 'post'])) : ?>
        <time class="body-16-bold"><?php echo date("F j, Y", strtotime($post->post_date)); ?></time>
      <?php endif; ?>
    </a>
  <?php endforeach; ?>
</div>
