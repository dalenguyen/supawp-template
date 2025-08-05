<?php

/**
 * Add Template to the frontend
 */

defined('ABSPATH') || exit;

class SupaWP_Template {
    private static $initiated = false;

    public static function init() {
        if (!self::$initiated) {
            self::init_hooks();
        }
    }

    public static function init_hooks() {
        self::$initiated = true;
        add_action('wp_enqueue_scripts', array('SupaWP_Template', 'load_supawp_template_assets'));
    }

    public static function load_supawp_template_assets() {
        wp_enqueue_script('supawp-template', SUPAWP_TEMPLATE__PLUGIN_URL . 'js/supawp-template.js', array('supawp-auth'), SUPAWP_TEMPLATE_VERSION, false);
        wp_enqueue_style('supawp-template', SUPAWP_TEMPLATE__PLUGIN_URL . 'css/supawp-template.css', array(), SUPAWP_TEMPLATE_VERSION);
    }
}
