<?php

/**
 * Add XML file type support to WordPress uploads.
 *
 * This function modifies the list of allowed mime types to include XML files,
 * allowing users to upload XML files through the WordPress media uploader.
 *
 * @param array $mimes An associative array of mime types keyed by the file extension.
 * @return array The modified array of mime types including XML files.
 */
function custom_upload_xml($mimes)
{
  // Add support for XML files by merging the existing mime types with the XML mime type.
  $mimes = array_merge($mimes, array('xml' => 'application/xml'));
  return $mimes;
}

add_filter('upload_mimes', 'custom_upload_xml');

/**
 * Validate uploaded files based on specific criteria.
 *
 * This function checks if the uploaded file name contains the substring 'DxDiag' and if the file is not empty.
 * If either condition is not met, an error message is added to the errors array.
 *
 * @param array $errors An array of errors encountered during file upload.
 * @param array $file An associative array of file attributes such as 'name' and 'size'.
 * @param array $field An associative array of field attributes (not used in this function).
 * @return array The modified array of errors, including any new errors encountered.
 */
function file_upload_prefilter($errors, $file, $field)
{
  // Check if the file name contains 'DxDiag'
  if (stripos($file['name'], 'dxdiag') === false) {
    $errors[] = __('File name does not include "DxDiag"');
  }

  // Check if the file is empty
  if (intval($file['size']) == 0) {
    $errors[] = __('File is empty');
  }

  return $errors;
}


add_filter('acf/upload_prefilter/name=dxdiag_upload', 'file_upload_prefilter', 10, 3);

/**
 * Validate uploaded XML files based on specific criteria and context.
 *
 * This function checks the context of the upload and performs different validation steps.
 * For "basic_upload", it checks if the file name contains the substring 'DxDiag'.
 * For "upload", it attempts to parse the XML file and calls a function for further processing.
 * If parsing fails, it captures the error message.
 *
 * @param array $errors An array of errors encountered during file upload.
 * @param array $file An associative array of file attributes such as 'name' and 'size'.
 * @param array $attachment An associative array of attachment attributes including 'url' and 'tmp_name'.
 * @param array $field An associative array of field attributes (not used in this function).
 * @param string $context The context of the upload, such as "basic_upload" or "upload".
 * @return array The modified array of errors, including any new errors encountered.
 */
function validate_xml_file($errors, $file, $attachment, $field, $context)
{
  switch ($context) {
    case "basic_upload":
      // Check if the file name contains 'DxDiag' during basic upload
      if (stripos($attachment['url'], 'dxdiag') === false) {
        $errors[] = __('File name does not include "DxDiag"');
      }
      break;

    case "upload":
      // Attempt to parse the XML file during upload
      $xml = simplexml_load_file($attachment['tmp_name']);
      if ($xml) {
        user_meta_parsing($xml);
      } else {
        // Capture and add the XML parsing error message
        $errors[] = (string)libxml_get_last_error()->message;
      }
      break;
  }

  return $errors;
}

add_filter('acf/validate_attachment/name=dxdiag_upload', 'validate_xml_file', 10, 5);

/**
 * Parse XML data and update user meta based on predefined nodes and keys.
 *
 * This function parses an XML file and updates user meta information in WordPress
 * based on the structure and values defined in the XML. It processes nodes and keys
 * configured in the options table and handles nested subnodes and subsubnodes.
 *
 * @param SimpleXMLElement $xml The XML data to be parsed.
 * @return void
 */
function user_meta_parsing($xml)
{
  // Extract the user ID from the POST data
  $user_id = substr($_POST['_acf_post_id'], 5);

  // Delete existing DxDiag user meta if it exists
  if (get_user_meta($user_id, 'dxdiag_last_updated', true) !== '') {
    delete_dxdiag_user_meta($user_id);
  }

  // Check if there are predefined nodes in the options
  if (have_rows('nodes', 'option')) {
    // Loop through each predefined node
    while (have_rows('nodes', 'option')) : the_row();
      $node = get_sub_field('name');
      $quantity = intval(get_sub_field('quantity'));
      $subnode = get_sub_field('subnode');
      $subsubnode = get_sub_field('subsubnode');

      if ($quantity >= 1) {
        // Handle subsubnode if it exists
        if ($subsubnode !== '') {
          foreach ($xml->$node->$subnode->$subsubnode as $subarray) {
            if (have_rows('node', 'option')) {
              while (have_rows('node', 'option')) : the_row();
                $key = get_sub_field('key');
                $value = (string)$subarray->$key;
                $meta_key = 'dxdiag_' . strtolower($subsubnode) . '_' . strtolower($key) . '_' . $quantity;
                update_user_meta($user_id, $meta_key, $value);
              endwhile;
            }
            $quantity++;
          }
        } else {
          // Handle subnode if subsubnode does not exist
          foreach ($xml->$node->$subnode as $subarray) {
            if (have_rows('node', 'option')) {
              while (have_rows('node', 'option')) : the_row();
                $key = get_sub_field('key');
                $value = (string)$subarray->$key;
                $meta_key = 'dxdiag_' . strtolower($subnode) . '_' . strtolower($key) . '_' . $quantity;
                update_user_meta($user_id, $meta_key, $value);
              endwhile;
            }
            $quantity++;
          }
        }
      } else {
        // Handle nodes without quantity
        if (have_rows('node', 'option')) {
          while (have_rows('node', 'option')) : the_row();
            $key = get_sub_field('key');
            $value = (string)$xml->$node->$key;
            $meta_key = 'dxdiag_' . strtolower($key);
            update_user_meta($user_id, $meta_key, $value);
          endwhile;
        }
      }
    endwhile;
  }

  // Update user meta to record the last update time
  update_user_meta($user_id, 'dxdiag_last_updated', time());
  // Clean up user meta fields related to opt-out
  delete_user_meta($user_id, 'opt_out');
  delete_user_meta($user_id, 'opt_out_timestamp');
}

/**
 * Delete all DxDiag-related user meta data.
 *
 * This function removes all user meta fields related to DxDiag for a given user.
 * It searches for user meta keys containing 'dxdiag' and deletes them. Additionally,
 * it deletes specific user meta fields like 'file', '_file', '_validate_email', and '__validate_email'.
 *
 * @param int $user_id The ID of the user whose meta data is to be deleted.
 * @return void
 */
function delete_dxdiag_user_meta($user_id)
{
  // Get all user meta for the specified user
  $all_meta_for_user = array_map(function ($a) {
    return $a[0];
  }, get_user_meta($user_id));

  // Loop through all user meta keys and delete those containing 'dxdiag'
  foreach ($all_meta_for_user as $key => $value) {
    if (strpos($key, 'dxdiag') !== false) {
      delete_user_meta($user_id, $key);
    }
  }

  // Delete specific user meta fields
  delete_user_meta($user_id, 'file');
  delete_user_meta($user_id, '_file');
  delete_user_meta($user_id, '_validate_email');
  delete_user_meta($user_id, '__validate_email');
}