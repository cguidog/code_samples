<?php
$title = explode(' ', get_the_title());
$platforms = get_field('social_media');
$team = has_term('leadership-team', 'team') ? 'leadership-team' : 'advisory-board';
?>

<section class="section static single-bio-card">
  <div class="single-bio-card-block">
    <div class="single-bio-card-block-column">
      <a href="/leadership/?_bio_select=<?php echo $team; ?>" class="body-21-bold link-eqlipse" aria-label="Back to Leadership page">Back</a>
      <h1 class="hero-content-heading single-bio-name display-120">
        <?php foreach ($title as $word) : ?>
          <span><?php echo $word; ?></span>
        <?php endforeach; ?>
      </h1>
    </div>
    <div class="single-bio-card-block-column">
      <?php echo get_lazy_thumbnail(get_the_ID(), 'card-thumbnail', 'single-bio-image'); ?>
    </div>
  </div>
  <div class="single-bio-card-block">
    <div class="single-bio-card-block-column top-trim">
      <h2 class="color-navy-100 body-28"><?php the_field('profile_title'); ?></h2>
    </div>
    <?php if (is_array($platforms)) : ?>
      <div class="single-bio-card-block-column top-trim">
        <?php get_template_part('theme-components/social-media-platforms', null, array(
          'platforms' => $platforms,
          'profile_name' => get_the_title()
        )); ?>
      </div>
    <?php endif; ?>
  </div>
</section>