<?php

/**
 * Add Template to the admin
 */

defined('ABSPATH') || exit;

class SupaWP_Template_Admin {
    private static $initiated = false;

    public static function init() {
        if (!self::$initiated) {
            self::init_hooks();
        }
    }

    public static function init_hooks() {
        self::$initiated = true;
        add_action('admin_enqueue_scripts', array('SupaWP_Template_Admin', 'load_supawp_template_admin_assets'));
        add_action('admin_menu', array('SupaWP_Template_Admin', 'add_supawp_template_menu'));
    }

    public static function load_supawp_template_admin_assets() {
        wp_enqueue_script('supawp-template-admin', SUPAWP_TEMPLATE__PLUGIN_URL . 'js/dashboard-supawp-template.js', array('jquery'), SUPAWP_TEMPLATE_VERSION, false);
    }

    public static function add_supawp_template_menu() {
        if (class_exists('Supabase')) {
            add_submenu_page(
                'supawp',
                'SupaWP Template',
                'Template',
                'manage_options',
                'supawp-template',
                array('SupaWP_Template_Admin', 'add_supawp_template_menu_html')
            );
        }
    }

    public static function add_supawp_template_menu_html() {
?>
        <div class="wrap">
            <h1>SupaWP Template</h1>
            <p>This is the SupaWP Template extension. Use this template to extend SupaWP functionality with custom JavaScript and CSS.</p>

            <h2>How to Use</h2>
            <p>Edit the following files to customize your extension:</p>
            <ul>
                <li><code>js/supawp-template.js</code> - Add your custom JavaScript</li>
                <li><code>css/supawp-template.css</code> - Add your custom styles</li>
            </ul>

            <h2>Available Hooks</h2>
            <p>The template automatically hooks into SupaWP's authentication system and provides access to the Supabase client.</p>
        </div>
<?php
    }
}
