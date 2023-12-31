<?php
/*
Plugin Name: WordPress OpenAI Blog Content Generator (OAI-BCG-WP)
Plugin URI: https://www.oai-bcg-wp.com
Description: Generates unique and SEO-optimized blog content for WordPress sites based on user-defined topics and keywords.
Version: 1.0
Author: Your Name
Author URI: https://www.yourwebsite.com
License: GPL-2.0
Text Domain: oai-bcg-wp
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define OAI-BCG-WP Plugin Directory
if (!defined('OAI_BCG_WP_PLUGIN_DIR')) {
    define('OAI_BCG_WP_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Include the admin settings
require_once(OAI_BCG_WP_PLUGIN_DIR . 'admin-settings.php');

// Include the post generator
require_once(OAI_BCG_WP_PLUGIN_DIR . 'post-generator.php');

// Include the SEO optimizer
require_once(OAI_BCG_WP_PLUGIN_DIR . 'seo-optimizer.php');

// Include the proofreader
require_once(OAI_BCG_WP_PLUGIN_DIR . 'proofreader.php');

// Enqueue styles and scripts
function oai_bcg_wp_enqueue_scripts() {
    wp_enqueue_style('oai-bcg-wp-styles', plugins_url('styles.css', __FILE__));
    wp_enqueue_script('oai-bcg-wp-scripts', plugins_url('scripts.js', __FILE__));
}
add_action('admin_enqueue_scripts', 'oai_bcg_wp_enqueue_scripts');

// Activation hook
function oai_bcg_wp_activate() {
    // Activation code here
}
register_activation_hook(__FILE__, 'oai_bcg_wp_activate');

// Deactivation hook
function oai_bcg_wp_deactivate() {
    // Deactivation code here
}
register_deactivation_hook(__FILE__, 'oai_bcg_wp_deactivate');

?>
