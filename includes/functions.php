<?php

// delete post=1 which is Hello World post.
wp_delete_post(1, true);

function deleteDefaultPlugins()
{
  // Delete Akismet plugin
  deactivate_plugins('akismet/akismet.php');
  delete_plugins(array('akismet/akismet.php'));

  // Delete Hello Dolly plugin
  deactivate_plugins('hello.php');
  delete_plugins(array('hello.php'));
}
add_action('admin_init', 'deleteDefaultPlugins');

function changePermalinkStructure()
{
  // Set permalink structure to Post name
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure('/%postname%/');
  $wp_rewrite->flush_rules(true);
}
add_action('admin_init', 'changePermalinkStructure');

// Set timezone to Kuala Lumpur
global $wpdb;
// Update the timezone_string option to Asia/Kuala_Lumpur
$wpdb->query($wpdb->prepare(
  "UPDATE $wpdb->options SET option_value = %s WHERE option_name = 'timezone_string'",
  'Asia/Kuala_Lumpur'
));

// Set date format to d/m/Y
update_option('date_format', 'd/m/Y');
