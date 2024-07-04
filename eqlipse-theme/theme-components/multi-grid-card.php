<?php
$item = $args && isset($args['item']) ? $args['item'] : null;
$editor = $args && isset($args['editor']) ? $args['editor'] : null;

if ($item) : ?>
<div class="spec">
  <?php if ($item['type'] === 'text') :
    if ($item['name']) : ?>
      <span class="body-16 <?php echo $editor ? 'color-navy-200' :  'color-navy-50'; ?> spec-name"><?php echo $item['name']; ?></span>
    <?php endif;
    if ($item['value']) : ?>
      <span class="body-16-bold <?php echo $editor ? 'color-navy-200' : 'color-navy-50'; ?> spec-value"><?php echo $item['value']; ?></span>
    <?php endif; ?>
    <?php else :
    if ($item['link_text'] && $item['link_url']) : ?>
      <a target="_blank" class="<?php echo $editor ? 'color-navy-200' :  'color-navy-50'; ?> body-16-bold spec-link" rel="noopener" href=<?php echo $item['link_url']; ?>><?php echo $item['link_text']; ?></a>
  <?php endif;
  endif; ?>
</div>
<?php endif; ?>