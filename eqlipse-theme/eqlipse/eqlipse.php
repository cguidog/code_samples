<?php

/**
 * Generates inline CSS style for setting a background image with various options.
 *
 * @param string $url The URL of the background image.
 * @param string $size Optional. The size of the background image. Default is 'cover'.
 *                    Possible values: 'auto', 'cover', 'contain', or length values like '200px', '50%'.
 * @param string $repeat Optional. The repeat behavior of the background image. Default is 'no-repeat'.
 *                      Possible values: 'repeat', 'repeat-x', 'repeat-y', or 'no-repeat'.
 * @param string $position Optional. The initial position of the background image. Default is 'center'.
 *                         Possible values: 'left', 'center', 'right', 'top', 'bottom', or length values like '10px', '50%'.
 * @param string $attachment Optional. The attachment behavior of the background image. Default is 'initial'.
 *                            Possible values: 'scroll', 'fixed', 'local', or 'initial'.
 * @param string $styles Optional. Any additional inline styles.
 *
 * @return string|null The generated inline CSS style as a string if $url is provided and not empty, null otherwise.
 */

function backgroundImage($url = null, $size = 'cover', $repeat = 'no-repeat', $position = 'center', $attachment = 'initial', $styles = null)
{
  $background_image = $url ? "url($url)" : "";
  $html = "style='background: $background_image $repeat $position;background-size: $size;background-attachment: $attachment;$styles'";

  return $html;
}

/**
 * Build an array of query arguments for retrieving posts based on various criteria.
 *
 * @param string $post_type Optional. The post type to retrieve. Default is 'post'.
 * @param string $taxonomy Optional. The taxonomy to filter posts by categories. Default is 'category'.
 * @param array|null $categories Optional. An array of category IDs to filter posts by. Default is null.
 * @param int|null $postsperpage Optional. The number of posts to retrieve per page. Default is null (unlimited).
 * @param int|null $not_in Optional. An array of post IDs to exclude from the query results. Default is null.
 * @param int|null $in Optional. The post ID to include in the query results. Default is null.
 * @param int|null $author Optional. The author ID to filter posts by. Default is null.
 * @param string $status Optional. The post status to retrieve. Default is 'publish'.
 *
 * @return array An array of query arguments to be used with WP_Query to retrieve posts.
 */

function queryBuilder($post_type = 'post', $taxonomy = 'category', $categories = null, $postsperpage = null, $not_in = null, $in = null, $author = null, $status = 'publish')
{
  if ($in != null) {
    $args = array(
      'post_type' => $post_type,
      'post_status' => $status,
      'post__in' => array($in),
    );
  } else {
    if ($categories != null) {
      $tax_query = array(
        array(
          'taxonomy' => $taxonomy,
          'field' => 'term_id',
          'terms' => $categories,
        ),
      );

      $args = array(
        'post_type' => $post_type,
        'post_status' => $status,
        'post__not_in' => array($not_in),
        'tax_query' => $tax_query,
        'author'  => $author,
      );
    } else {
      $args = array(
        'post_type' => $post_type,
        'post_status' => $status,
        'post__not_in' => array($not_in),
        'author'  => $author,
      );
    }
  }

  if ($postsperpage != null) {
    $args['posts_per_page'] = $postsperpage;
  } else {
    $args['posts_per_page'] = -1;
  }

  return $args;
}

/**
 * Get Video Thumbnail URI
 *
 * This function generates the URI (URL) for the thumbnail image of a YouTube video.
 * It takes the YouTube video's URL and an optional size parameter to specify the
 * desired thumbnail size. If no size is provided, a default high-quality thumbnail
 * URI is constructed. If a size is provided, a thumbnail URI with the specified size
 * is generated.
 *
 * @since 1.0.0
 *
 * @param string $video_uri The URL of the YouTube video.
 * @param string|null $size Optional. The desired thumbnail size (e.g., 'mqdefault').
 * @return string The URI (URL) of the video thumbnail image.
 */

function get_video_thumbnail_uri($video_uri, $size = null)
{

  $thumbnail_uri = '';

  $video = get_video_id($video_uri);

  if (is_null($size)) {
    $thumbnail_uri = 'https://img.youtube.com/vi/' . $video . '/maxresdefault.jpg';
  } else {
    $thumbnail_uri = 'https://img.youtube.com/vi/' . $video . '/' . $size . '.jpg';
  }

  return $thumbnail_uri;
}

/**
 * Get Video ID from YouTube URL
 *
 * This function takes a YouTube video URL as input and extracts the unique
 * identifier of the video. It uses regular expressions to match and capture
 * the video ID from various YouTube URL formats. The extracted video ID
 * is returned for further processing.
 *
 * @since 1.0.0
 *
 * @param string $url The YouTube video URL.
 * @return string|null The extracted YouTube video ID, or null if not found.
 */

function get_video_id($url)
{
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
  if ($match) {
    $youtube_id = $match[1];
  } else {
    $youtube_id = null;
  }
  return $youtube_id;
}

/**
 * Get Video Embed URL
 *
 * This function takes a video URL and extracts the video's unique identifier.
 * It then constructs an embed URL for the video using the extracted identifier.
 * The resulting embed URL is suitable for embedding the video in a web page
 * or an iframe.
 *
 * @since 1.0.0
 *
 * @param string $url The URL of the video.
 * @return string The embed URL for the video.
 */

function get_video_embed($url)
{
  $id = get_video_id($url);
  $embed = 'https://www.youtube-nocookie.com/embed/' . $id;

  return $embed;
}

/**
 * Retrieve the author of a specified post.
 *
 * This function wraps the WordPress `get_post_field` function specifically for retrieving 
 * the post author. It takes a post ID as its parameter and returns the ID of the user 
 * who authored that post.
 *
 * @param int $post_id The ID of the post for which to get the author.
 * @return int|string Author's user ID or an empty string if post does not exist.
 */

function get_post_author($post_id)
{
  return get_post_field('post_author', $post_id);
}

/**
 * Retrieve a lazy-loaded image for the provided post.
 *
 * This function returns an HTML <img> element with an empty 'src' attribute, 
 * but a populated 'data-src' attribute for lazy-loading purposes. The image 
 * also has width and height attributes based on the requested thumbnail size, 
 * and an 'alt' attribute for accessibility.
 *
 * @param int $post_id  The ID of the post for which to retrieve the thumbnail.
 * @param string $size  Optional. The desired size of the image. Default 'full' (original size).
 * @param string $class Optional. Additional classes to add to the <img> element. Default empty.
 *
 * @return string HTML <img> element string, or empty string if thumbnail doesn't exist.
 */

function get_lazy_thumbnail($post_id, $size = 'full', $class = '')
{
  if (!$post_id) {
    return '';
  }

  $thumbnail_id = get_post_thumbnail_id($post_id);

  if (!$thumbnail_id) {
    return '';
  }

  $thumbnail = wp_get_attachment_image_src($thumbnail_id, $size, false);

  if (!$thumbnail) {
    return '';
  }

  $url = esc_url($thumbnail[0]);
  $width = esc_attr($thumbnail[1]);
  $height = esc_attr($thumbnail[2]);
  $alt = esc_attr(get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true));

  $classes = ['lazy'];
  if ($class) {
    $classes[] = esc_attr($class);
  }
  $class_string = implode(' ', $classes);

  $img_html = sprintf('<img src="" data-src="%s" width="%s" height="%s" alt="%s" class="%s">', $url, $width, $height, $alt, $class_string);

  return $img_html;
}

/**
 * Checks whether there's at least one sub-array with the specified key, 
 * and the value for that key is an array.
 *
 * Iterates over each sub-array within the main array and checks if the given key exists
 * and its corresponding value is an array.
 *
 * @param array $arrays The main array containing the sub-arrays to be checked.
 * @param string $key The key to be checked within each sub-array.
 *
 * @return bool Returns true if at least one sub-array contains the specified key and its value is an array.
 *              Returns false if no such key is found or the value is not an array.
 */

function checkArrayAsValue($arrays, $key)
{
  foreach ($arrays as $array) {
    if (isset($array[$key]) && is_array($array[$key])) {
      return true;
    }
  }
  return false;
}

/**
 * Checks if a given string contains any word longer than 10 characters.
 *
 * @param string $inputString The input string to be checked.
 * @return bool Returns true if any word in the string is longer than 10 characters, otherwise returns false.
 *
 * @example
 * hasLongWord("Hello thisisaverylongwordindeed!") // true
 * hasLongWord("Hello world!") // false
 */
function hasLongWord($inputString) {

  // Split the string into words using space as the delimiter
  $words = explode(' ', $inputString);
  
  // Loop through each word
  foreach ($words as $word) {
      // Check the length of the current word
      if (strlen($word) > 10) {
          // If the word is longer than 10 characters, return true
          return true;
      }
  }

  // If no word is found to be longer than 10 characters, return false
  return false;
}
