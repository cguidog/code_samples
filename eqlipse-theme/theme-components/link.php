<?php

$link = $args && isset($args['link']) ? $args['link'] : null;
$color = $args && isset($args['color']) ? $args['color'] : null;

if ( is_array($link) && $link['link_text'] ):
  if ( $link['link_type'] == 'internal' ): ?>
    <a class="<?php echo $link['link_style'] === 'link-eqlipse' ? "$link[link_style] body-21-bold" : "$link[link_style] caption-12"; echo $color ? ' color-'. $color : null; ?>" href=<?php echo $link['internal_url'].$link['url_string'] ?>><?php echo $link['link_text'] ?></a>
  <?php else: ?>
    <a class="<?php echo $link['link_style'] === 'link-eqlipse' ? "$link[link_style] body-21-bold" : "$link[link_style] caption-12"; echo $color ? ' color-'. $color : null; ?>" href=<?php echo $link['url'] ?> rel="noopener" target="_blank"><?php echo $link['link_text'] ?></a>
  <?php endif;
endif; ?>