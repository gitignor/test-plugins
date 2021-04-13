<?php

/**
 * Plugin Name: My Github Repos by Alex
 * Description: GitHub Repos Widget
 * Version: 1.0
 * Author: Alex Nik
 * Text Domain: git_domain
 *
 */

// Exit if Accessed Directly

if (!defined('ABSPATH')) {
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/my-github-repos-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__) . '/includes/my-github-repos-class.php');

// Register Widget
function git_register_widget()
{
    register_widget('WP_My_Github_Repos');
}

add_action('widgets_init', 'git_register_widget');