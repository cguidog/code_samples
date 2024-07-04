<?php
$platforms = $args && $args['platforms'] ? $args['platforms'] : get_field("platforms", "option");
$site_name = $args && $args['profile_name'] ? $args['profile_name'] : get_bloginfo();
?>


<?php if ( $platforms ): ?>
  <div class='social-media-platforms'>
    <?php foreach ( $platforms as $platform ): ?>
      <?php if ( $platform["platform_name"] && $platform["platform_url"] ): ?>
        <a class='social-media-icon <?php echo $platform['platform_name']['value'] ?>-icon' href=<?php echo $platform["platform_url"]; ?> 
          target='_blank' aria-label='<?php echo "Visit the $site_name {$platform['platform_name']['label']} profile"; ?>'>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>