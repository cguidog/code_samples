<?php

namespace App;

use TwitterAPIExchange;

class twitter
{
  /**
   * Retrieve Twitter API credentials from the options table.
   *
   * This function fetches the Twitter API credentials stored in the options 'twitter_feed' field. If the credentials are available, it returns an array
   * containing the OAuth access token, access token secret, consumer key, and consumer secret.
   * If the credentials are not available, it returns null.
   *
   * @return array|null An associative array with Twitter API credentials or null if not available.
   */
  private static function get_twitter_credentials()
  {
    $credentials = function_exists('get_field') ? get_field('twitter_feed', 'option') : NULL;

    if (!is_null($credentials)) {
      $settings = array(
        'oauth_access_token' => $credentials['oauth_access_token'],
        'oauth_access_token_secret' => $credentials['oauth_access_token_secret'],
        'consumer_key' => $credentials['consumer_key'],
        'consumer_secret' => $credentials['consumer_secret']
      );
    } else {
      $settings = null;
    }

    return $settings;
  }

  /**
   * Fetch and display the latest tweets from a specific Twitter user.
   *
   * This function retrieves tweets from a specified Twitter user's timeline using the Twitter API.
   * It caches the tweets in a transient and an option to minimize API requests.
   * If cached tweets are available, it displays them; otherwise, it fetches new tweets from the API.
   *
   * @param string $username The Twitter username whose timeline is to be fetched.
   * @return void
   */
  public static function timeline($username)
  {
    $key = '_tweets';
    $tweets = get_transient($key) ?? [];
    $count = 15;

    // Get Twitter API credentials
    $settings = \App\twitter::get_twitter_credentials();

    if (empty($tweets) && $settings !== null) {
      $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
      $getfield = '?count=' . $count . '&include_rts=false&exclude_replies=true&tweet_mode=extended&include_ext_alt_text=true&screen_name=' . $username;
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($settings);
      $response = $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest();
      $json = json_decode($response);
      $error = $json->errors ?? null;

      if (!$error) {
        for ($i = 0; $i < 6; $i++) {
          $tweet = $json[$i];
          $id = $tweet->id ?? null;
          $handle = $tweet->user->screen_name ?? null;
          $display_name = $tweet->user->name ?? null;
          $profile_img = $tweet->user->profile_image_url_https ?? null;
          $text = $tweet->full_text ?? null;
          $links = $tweet->entities->urls ?? null;
          $images = $tweet->extended_entities->media ?? null;
          $user_mentions = $tweet->entities->user_mentions ?? null;
          $created_at = $tweet ? strtotime($tweet->created_at) : null;
          $created_date = $tweet ? date('M d Y', $created_at) : null;
          $created_time = $tweet ? date('g:i A', $created_at) : null;

          if ($tweet) {
            if ($text) {
              // Replace image URLs with image elements
              if ($images) {
                foreach ($images as $image) {
                  $alt_text = $image->ext_alt_text ? $image->ext_alt_text : 'Tweet image';
                  $image_element = '<div><a class="focus-visible" target="_blank" rel="noopener" href="' . $image->url . '" ><img class="tweet-image lazy" src data-src="' . $image->media_url_https . '" alt="' . $alt_text . '" width="' . $image->sizes->small->w . '" height="' . $image->sizes->small->h . '"/></a></div>';
                  $text = str_replace($image->url, $image_element, $text);
                }
              }
              // Replace user mentions with links
              if ($user_mentions) {
                foreach ($user_mentions as $mention) {
                  $link_element = '<a class="focus-visible" target="_blank" rel="noopener" href="https://twitter.com/' . $mention->screen_name . '">@' . $mention->screen_name . '</a>';
                  $text = str_replace('@' . $mention->screen_name, $link_element, $text);
                }
              }
              // Replace URLs with links
              if ($links) {
                foreach ($links as $link) {
                  $link_element = '<a class="focus-visible" target="_blank" rel="noopener" href="' . $link->url . '">' . $link->display_url . '</a>';
                  $text = str_replace($link->url, $link_element, $text);
                }
              }
            }

            $tweet_array = array(
              'id' => $id,
              'display_name' => $display_name,
              'handle' => $handle,
              'profile_img' => $profile_img,
              'text' => $text,
              'date' => $created_date,
              'time' => $created_time,
            );

            echo \App\template('partials.tweet', $tweet_array);
            $tweets[$i] = $tweet_array;
          }
        }

        set_transient($key, $tweets, 60 * 60 * 24); // Cache tweets for 24 hours
      }
    } else {
      foreach ($tweets as $tweet_array) {
        echo \App\template('partials.tweet', $tweet_array);
      }
    }
  }
}
