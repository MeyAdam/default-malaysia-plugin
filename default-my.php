<?php

/**
 * Plugin Name: Default MY
 * Description: Delete Hello World post. Delete Akismet & Hello Dolly plugin. Set Timezone to Kuala Lumpur. Set Date Format to d/m/Y. Set Permalink structure to Post name. Install Astra and Hello Elementor theme. Delete all theme except current, Astra & Hello Elementor theme.
 * Version: 1.0.0
 * Text Domain: default-my1
 */

if (!defined('ABSPATH')) {
  die('You cannot be here');
}

if (!class_exists('DefaultMY')) {
  class DefaultMY
  {
    public function __construct()
    {
      define('PLUGIN_PATH', plugin_dir_path(__FILE__));
    }

    public function initialize()
    {
      include_once(PLUGIN_PATH . 'includes/functions.php');
      include_once(PLUGIN_PATH . 'includes/install-theme.php');
      include_once(PLUGIN_PATH . 'includes/delete-theme.php');
    }
  }

  $default_my = new DefaultMY;
  $default_my->initialize();
}
