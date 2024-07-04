<?php
$logo = get_field('logo') ?: null;
$logo_width = $logo && !strpos($logo['url'], 'svg') ? $logo['width'] : null;
$logo_height = $logo && !strpos($logo['url'], 'svg') ? $logo['height'] : null;
$title = $args && $args['title'] ? $args['title'] : get_the_title();
$reduced_font = strlen($title) >= 40 || hasLongWord($title) ? 'reduced-font' : null;
$title_words = explode(' ', $title);
$date = $args ? $args['date'] : null;
$link = $args ? $args['guid'] : null;
$dark_mode = $args ? $args['dark_mode'] : get_field('dark_mode');
$thumbnail = $args ? $args['thumbnail'] : get_the_post_thumbnail_url();
$excerpt = !$args && $post->post_excerpt ? $post->post_excerpt : null;

?>

<section class="hero hero-observer lazy" data-bg="<?php echo $thumbnail; ?>" <?php echo backgroundImage(); ?>>
    <div class="mobile-overlay"></div>
    <div class="hero-content <?php echo $reduced_font; ?>">
        <?php if ($date) : ?>
            <time class="hero-content-date body-16-bold color-<?php echo $dark_mode ? 'cream-75' : 'navy-300'; ?>"><?php echo date("F j, Y", strtotime($date)); ?></time>
        <?php endif; ?>
        <h1 class="hero-content-heading color-<?php echo $dark_mode ? 'cream-75 ' : 'navy-300 '; echo $reduced_font; ?> display-90">
            <?php if ($logo) : ?>
                <img class="lazy" data-src=<?php echo $logo['url']; ?> alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" />
            <?php else :
                foreach($title_words as $word):
                    echo '<span>'. $word .'</span> ';
                endforeach;
            endif; ?>
        </h1>
        <?php if ($excerpt) : ?>
            <p class="hero-content-text body-28 color-<?php echo $dark_mode ? 'cream-75' : 'navy-300'; ?>"><?php echo $excerpt; ?></p>
        <?php endif; ?>
        <?php if ($link) : ?>
            <div class="hero-content-link"><a class="link-eqlipse<?php echo $dark_mode ? '--dark' : null; ?> body-21-bold" href=<?php echo $link; ?> aria-label="<?php echo 'Read more about' . $title; ?>">Read more</a></div>
        <?php endif; ?>
    </div>
</section>