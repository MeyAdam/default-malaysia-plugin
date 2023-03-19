<?php

// Install Astra Theme
add_action('admin_init', 'astra_installer');
function astra_installer()
{
  $astra = wp_get_theme('astra');
  if (!$astra->exists()) {
    $theme = wp_remote_get('https://downloads.wordpress.org/theme/astra.4.0.2.zip');
    WP_Filesystem();
    global $wp_filesystem;
    $destination = get_theme_root() . '/astra.zip';
    $wp_filesystem->put_contents($destination, $theme['body']);
    $zip = new ZipArchive;
    $res = $zip->open($destination);
    if ($res === true) {
      $zip->extractTo(get_theme_root());
      $zip->close();
      unlink($destination);
    }
  }
}

// Install Hello Elementor Theme
add_action('admin_init', 'hello_elementor_installer');
function hello_elementor_installer()
{
  $hello_elementor = wp_get_theme('hello-elementor');
  if (!$hello_elementor->exists()) {
    $theme = wp_remote_get('https://downloads.wordpress.org/theme/hello-elementor.2.6.1.zip');
    WP_Filesystem();
    global $wp_filesystem;
    $destination = get_theme_root() . '/hello-elementor.zip';
    $wp_filesystem->put_contents($destination, $theme['body']);
    $zip = new ZipArchive;
    $res = $zip->open($destination);
    if ($res === true) {
      $zip->extractTo(get_theme_root());
      $zip->close();
      unlink($destination);
    }
  }
}
