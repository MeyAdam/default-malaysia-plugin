<?php

// delete all theme except current theme, Astra and Hello Elementor
add_action('admin_init', 'delete_unused_themes');
function delete_unused_themes()
{
  $current_theme = wp_get_theme();
  $themes = wp_get_themes();
  foreach ($themes as $theme) {
    if ($theme->get('Name') !== $current_theme->get('Name') && $theme->get('Name') !== 'Astra' && $theme->get('Name') !== 'Hello Elementor') {
      $theme_path = get_theme_root() . '/' . $theme->get_stylesheet();
      if (is_dir($theme_path)) {
        WP_Filesystem();
        global $wp_filesystem;
        $wp_filesystem->delete($theme_path, true);
      }
    }
  }
}