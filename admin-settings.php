<?php
/*
File: admin-settings.php
Description: Admin settings for the WordPress OpenAI Blog Content Generator (OAI-BCG-WP)
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu
function oai_bcg_wp_add_admin_menu() {
    add_menu_page(
        'OpenAI Blog Content Generator',
        'OAI-BCG-WP Settings',
        'manage_options',
        'oai-bcg-wp',
        'oai_bcg_wp_settings_page',
        'dashicons-admin-generic',
        81
    );
}
add_action('admin_menu', 'oai_bcg_wp_add_admin_menu');

// Admin settings page
function oai_bcg_wp_settings_page() {
    ?>
    <div class="wrap">
        <h1>OpenAI Blog Content Generator Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('oai_bcg_wp_settings');
            do_settings_sections('oai_bcg_wp');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function oai_bcg_wp_register_settings() {
    register_setting('oai_bcg_wp_settings', 'oai_bcg_wp_input_title');
    register_setting('oai_bcg_wp_settings', 'oai_bcg_wp_length');

    add_settings_section(
        'oai_bcg_wp_settings_section',
        'Blog Post Settings',
        '',
        'oai_bcg_wp'
    );

    add_settings_field(
        'oai_bcg_wp_input_title',
        'Input Title',
        'oai_bcg_wp_input_title_render',
        'oai_bcg_wp',
        'oai_bcg_wp_settings_section'
    );

    add_settings_field(
        'oai_bcg_wp_length',
        'Length',
        'oai_bcg_wp_length_render',
        'oai_bcg_wp',
        'oai_bcg_wp_settings_section'
    );
}
add_action('admin_init', 'oai_bcg_wp_register_settings');

// Render input title field
function oai_bcg_wp_input_title_render() {
    $input_title = get_option('oai_bcg_wp_input_title');
    ?>
    <input type="text" name="oai_bcg_wp_input_title" value="<?php echo $input_title; ?>">
    <?php
}

// Render length field
function oai_bcg_wp_length_render() {
    $length = get_option('oai_bcg_wp_length');
    ?>
    <select name="oai_bcg_wp_length">
        <option value="short" <?php selected($length, 'short'); ?>>Short</option>
        <option value="medium" <?php selected($length, 'medium'); ?>>Medium</option>
        <option value="long" <?php selected($length, 'long'); ?>>Long</option>
    </select>
    <?php
}
?>
</h1>