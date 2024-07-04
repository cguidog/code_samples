<?php
global $pagenow;
$heading = get_field('heading');
$layout = get_field('layout') ?: "grid";
$source = get_field('posts_source');
$post_type = get_field('post_type') ?: null;
$filter = get_field('filter') ?: null;
$categories = get_field('post_category') ?: null;

$taxonomy = null;
if ($filter && $post_type) {
  $category_field = get_field($post_type . '_category');
  if (is_string($category_field)) {
      // If $category_field is a string, split it by space
      $taxonomy = explode(' ', $category_field);
  }
}


$term = $taxonomy ? [$taxonomy[0]] : null;

if ($taxonomy && isset($taxonomy[1])) {
  $taxonomy_type = $taxonomy[1];
} elseif(get_field('post_category')) {
  $taxonomy_type = 'category';

} else {
  $taxonomy_type = 'category';
}

$limit_posts = get_field('limit_posts') == 1 ?: null;
$post_count = get_field('max_posts') ?: null;
// $args = $source === 'query' ? queryBuilder($post_type, $taxonomy_type, $term, $limit_posts ? $post_count : null) : null;
$args = $source === 'query' ? queryBuilder($post_type, $taxonomy_type, $categories, $limit_posts ? $post_count : null) : null;
$query = $args ? new WP_Query($args) : null;
$posts = $query ? $query->posts : get_field('post_selection');
$spacing = get_field('section_spacing');
$top_spacing = $spacing && $spacing['top'] !== 'NULL' ? " m-t-$spacing[top]" : null;
$bottom_spacing = $spacing && $spacing['bottom'] !== 'NULL' ? " m-b-$spacing[bottom]" : null;

if ($posts) : ?>
  <section <?php echo isset($block['anchor']) ? "id=$block[anchor]" : null; ?> class="section post-list-section <?php echo "post-layout-$layout"; ?> <?php echo $post_type ? "post-type-$post_type " : null;?> <?php echo $pagenow === 'post.php' || $pagenow ===  'admin-ajax.php' ? 'static' : null; ?> <?php echo $top_spacing ? $top_spacing : null; echo $bottom_spacing ? $bottom_spacing : null; ?>">
    <?php if ($heading) : ?>
      <h2 class="display-51 color-navy-300 content__title" data-splitting data-effect1><?php echo $heading; ?></h2>
    <?php endif; ?>
    <div class="d-flex <?php echo $layout == 'list' ? 'flex-column' : 'flex-row'; ?>">
      <?php switch ($layout) {
        case 'grid':
          get_template_part('theme-components/post-grid', null, array('posts' => $posts, 'style' => get_field('card_style')));
          break;
        case 'slider':
          get_template_part('theme-components/post-slider', null, array('posts' => $posts));
          break;
        default:
          get_template_part('theme-components/post-list', null, array('posts' => $posts));
      } ?>
    </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>