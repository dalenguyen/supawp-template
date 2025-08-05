<?php

/**
 * The extension template for expanding SupaWP plugin.
 *
 * @category     WordPress_Plugin
 * @package      supawp-template
 * @author       dalenguyen
 * @link         https://techcater.com
 *
 * Plugin Name:  SupaWP Template
 * Plugin URI:   https://techcater.com
 * Description:  Extension template plugin for SupaWP
 * Author:       dalenguyen
 * Author URI:   http://dalenguyen.me
 * Contributors: Dale Nguyen (@dalenguyen)
 *
 * Version:      1.0.0
 *
 * Text Domain:  supawp-template
 * Domain Path: /languages/
 *
 * This is an add-on for WordPress
 * https://wordpress.org/
 *
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

define('SUPAWP_TEMPLATE_VERSION', '1.0.0');
define('SUPAWP_TEMPLATE__MINIMUM_WP_VERSION', '4.0.0');
define('SUPAWP_TEMPLATE__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SUPAWP_TEMPLATE__PLUGIN_URL', plugin_dir_url(__FILE__));

// Include the main template class
require_once SUPAWP_TEMPLATE__PLUGIN_DIR . 'includes/public/class.supawp-template.php';

// Initialize the template when SupaWP is ready
add_action('supawp_init', 'init_supawp_template');

function init_supawp_template() {
  if (class_exists('Supabase')) {
    SupaWP_Template::init();
  }
}

// Admin functionality
if (is_admin() || (defined('WP_CLI') && WP_CLI)) {
  require_once SUPAWP_TEMPLATE__PLUGIN_DIR . 'includes/dashboard/class.supawp-template.php';
  add_action('supawp_init', 'init_supawp_template_admin');
}

function init_supawp_template_admin() {
  if (class_exists('Supabase')) {
    SupaWP_Template_Admin::init();
  }
}
