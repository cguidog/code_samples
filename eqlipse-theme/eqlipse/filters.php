<?php

/**
 * Check Filetype and Extension Compatibility (WordPress Version-Specific)
 *
 * This function checks the compatibility of a file's extension and filetype against
 * a set of allowed MIME types. It performs this check while considering the WordPress
 * version. If the WordPress version is not 4.7.1, the original data is returned
 * unmodified. For WordPress version 4.7.1, the function validates the file's extension
 * and returns essential information for processing the file.
 *
 * @since 1.0.0
 *
 * @param array  $data       An associative array of data about the file.
 * @param array  $file       An array containing information about the uploaded file.
 * @param string $filename   The name of the uploaded file.
 * @param array  $mimes      Associative array of allowed MIME types.
 * @return array Modified array containing essential information about the file.
 */

function check_filetype_and_extension($data, $file, $filename, $mimes)
{

  global $wp_version;

  // Check if WordPress version is not 4.7.1, return data unmodified
  if ($wp_version !== '4.7.1') {
    return $data;
  }

  // Return essential file information
  $filetype = wp_check_filetype($filename, $mimes);

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}

add_filter('wp_check_filetype_and_ext', 'check_filetype_and_extension', 10, 4);

/**
 * Custom MIME Types for SVG Files
 *
 * This function adds support for SVG (Scalable Vector Graphics) files by
 * extending the list of allowed MIME types. It ensures that SVG files can
 * be uploaded and managed in WordPress.
 *
 * @since 1.0.0
 *
 * @param array $mimes Associative array of allowed MIME types.
 * @return array Updated array of allowed MIME types.
 */

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Fix SVG Display in WordPress
 *
 * This function generates inline CSS styles to adjust the display of SVG
 * attachments in WordPress. It targets specific classes to ensure proper
 * width and height settings for SVG images within the media library.
 *
 * @since 1.0.0
 */

function fix_svg()
{
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

/**
 * Register Quick Links Widget
 *
 * This function registers a custom sidebar widget area for displaying quick links
 * in the footer section of the website. The widget area supports custom menus
 * that provide quick access to various sections or pages.
 *
 * @since 1.0.0
 */

function register_quick_links_widget()
{

  register_sidebar(array(
    'name'          => 'Footer Quick Links',
    'id'            => 'footer_quick_links',
    'description'   => 'Hosts custom menues for quick access',
    'before_widget' => '<div class="quick-links-menu">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
}

add_action('widgets_init', 'register_quick_links_widget');

/**
 * Register Navigation Menus
 *
 * This function registers navigation menus for use in the theme. It defines
 * named navigation menu locations that can be used to assign menus through
 * the WordPress administration panel.
 *
 * @since 1.0.0
 */

register_nav_menus(
  array(
    'footer'  => __('Footer Menu', 'understrap'),
  )
);

/**
 * Enqueue custom scripts for the theme.
 *
 * This function enqueues the Owl Carousel JavaScript library 
 * from the theme's directory to provide carousel functionalities.
 * It depends on jQuery.
 * 
 * @see wp_enqueue_script() For more information on enqueuing scripts in WordPress.
 * @see get_stylesheet_directory_uri() To understand the base URL fetch mechanism for child themes.
 * 
 */

function enqueue_custom_scripts()
{
  wp_enqueue_style('enqueue_owl_carousel_styles', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/assets/owl.carousel.min.css', array(), '1.0', 'all');
  wp_enqueue_style('enqueue_owl_carousel_theme_styles', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/assets/owl.theme.default.min.css', array(), '1.0', 'all');
  wp_enqueue_script('enqueue_owl_carousel_script', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/owl.carousel.min.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/**
 * Enqueue Google Maps Script on the Contact page.
 *
 * Enqueues the Google Maps JavaScript API script with the API key
 * retrieved from ACF option field. The script is enqueued conditionally
 * and is only loaded on the page with the slug 'contact'.
 *
 * @see is_page()
 * @see wp_enqueue_script()
 * @see get_field()
 * @see add_action()
 * 
 * @return void
 */

function google_maps_enqueue_scripts() {
  // Check if the current page is the 'contact' page.
  if(is_page('contact')) {
      // Get Google API key from ACF option field.
      $api_key = get_field('google_api_key', 'option');
      
      // If API key is not empty, enqueue the Google Maps script with the API key.
      if (!empty($api_key)) {
          $src = "https://maps.googleapis.com/maps/api/js?key={$api_key}&callback=Function.prototype";
          wp_enqueue_script('google-maps-api', $src, array(), null, true);
      }
  }
}

add_action('wp_enqueue_scripts', 'google_maps_enqueue_scripts');

/**
 * Enqueues assets for the block editor.
 *
 * This function will enqueue styles and scripts specifically for the block editor
 * when the user is on the 'post.php' page. This is useful for integrating 
 * additional features or styles that the block editor can make use of.
 *
 * Included assets:
 * - Owl Carousel styles and scripts: Useful for adding carousel functionality.
 * - Child theme styles and scripts: Provides additional styles and scripts for the block editor.
 *
 * @global string $pagenow The name of the current page being viewed.
 *
 * @return void
 */

function add_block_editor_assets()
{
  global $pagenow;
  if ($pagenow === 'post.php') {
    wp_enqueue_style('enqueue_owl_carousel_styles', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/assets/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('enqueue_owl_carousel_theme_styles', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/assets/owl.theme.default.min.css', array(), '1.0', 'all');
    wp_enqueue_script('enqueue_owl_carousel_script', get_stylesheet_directory_uri() . '/src/js/owlcarousel/dist/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_style('block_editor_css', get_stylesheet_directory_uri() . '/css/child-theme.min.css');
    wp_enqueue_script('block_editor_js', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array('jquery', 'enqueue_owl_carousel_script'), '', true);
    wp_enqueue_script('myguten-script', get_stylesheet_directory_uri() . '/src/js/extend-blocks.js', array('wp-blocks'));
  }
}

add_action('enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0);

/**
 * Register a new image size for card thumbnails.
 *
 * This function adds a new image size called 'card-thumbnail' 
 * which is specifically meant to be used for card thumbnails.
 * The images will be cropped to 600x600 pixels.
 *
 * @uses add_image_size() To register a new image size in WordPress.
 */

function register_card_thumbnail()
{
  add_image_size('card-thumbnail', 600, 600, true);
}

add_action('after_setup_theme', 'register_card_thumbnail');

/**
 * Leadership page requires to a preselected filter to display the appropriate leadership group.
 *
 * If a user visits the '/leadership/' page without the '_bio_select' 
 * query parameter, they will be redirected to '/leadership/?_bio_select=leadership-team'.
 *
 * @uses is_page()      Checks if the current page is a specific page or page ID.
 * @uses wp_redirect()  Redirects the user to a specified URL.
 * @uses home_url()     Retrieves the home URL for the current site.
 */

function leadership_redirect()
{
  if (is_page('leadership') && !isset($_GET['_bio_select'])) {
    wp_redirect(home_url('/leadership/?_bio_select=leadership-team'), 302);
    exit;
  }
}

add_action('template_redirect', 'leadership_redirect');

/**
 * dequeue_dashicon
 *
 * This function checks if a user is not logged into WordPress.
 * If the user is not logged in, it dequeues and deregisters the 'dashicons' style.
 * Dashicons is the official icon font of the WordPress admin as of 3.8.
 * By dequeuing and deregistering it for non-logged-in users, you can potentially 
 * save on load time for those users, as they typically don't need these icons.
 *
 * The function is hooked to the 'wp_enqueue_scripts' action, ensuring it 
 * runs when the WordPress scripts and styles are enqueued for the front end.
 *
 * @hooked wp_enqueue_scripts
 */

function dequeue_dashicon()
{
  if (!is_user_logged_in()) {
    wp_dequeue_style( 'dashicons' );
    wp_deregister_style( 'dashicons' );
  }
}
add_action('wp_enqueue_scripts', 'dequeue_dashicon');

/**
 * eqlipse_login_styles
 *
 * This function modifies the WordPress login page styles by injecting custom CSS.
 * The styles primarily revolve around the color palette of #002836 and #e6eaeb 
 * along with some custom transitions for a more interactive feel.
 *
 * The key highlights of the styling are:
 * - The background color of the login and login form is set to #002836.
 * - The login logo is changed to use the 'eqlipse_logo.svg' image.
 * - The text, inputs, and buttons within the form are styled to match the theme.
 * - Transition effects are added for hover states on links and submit buttons.
 *
 * The function is hooked to the 'login_enqueue_scripts' action, ensuring it 
 * runs when the login scripts are enqueued.
 *
 * @hooked login_enqueue_scripts
 */

function eqlipse_login_styles()
{
  ?>
    <style type="text/css">
      .login,.login #loginform{background-color:#002836}#login h1 a,.login h1 a{background-image:url(/wp-content/uploads/2023/08/eqlipse_logo.svg);height:100px;width:300px;background-size:300px 100px;background-repeat:no-repeat;padding-bottom:10px}.login #loginform{border-color:transparent}.login #loginform label{color:#e6eaeb}.login #loginform .submit input[type=submit],.login #loginform input[type=password],.login #loginform input[type=text]{color:#e6eaeb;background-color:#002836;border-color:#6b828a;transition:.25s ease-in-out}.login #loginform .submit input[type=submit]:hover{background-color:#6b828a}.login #loginform .user-pass-wrap .wp-pwd .button-secondary{color:#e6e6e6}.login #login #backtoblog a,.login #login #nav a{transition:.25s ease-in-out;color:#e6eaeb}.login #login #backtoblog a:hover,.login #login #nav a:hover{color:#dba349}
    </style>
  <?php
}

add_action('login_enqueue_scripts', 'eqlipse_login_styles');


/**
 * Define ACF Google Map API configuration.
 *
 * This function is used to set the API configuration for the ACF Google Map field.
 * It attaches the API key, which is fetched from the options page of ACF using get_field function, to the API array.
 *
 * @param array $api   The existing API configuration array for the ACF Google Map field.
 * @return array       Returns the modified API configuration array with the added API key.
 */

function acf_google_map_api( $api ){
  $api['key'] = get_field('google_api_key', 'option');
  return $api;
}

add_filter('acf/fields/google_map/api', 'acf_google_map_api');

function mytheme_dequeue_editor_styles() {
  wp_dequeue_style( 'wp-block-library-theme' );
}

add_action( 'enqueue_block_editor_assets', 'mytheme_dequeue_editor_styles', 11 );
