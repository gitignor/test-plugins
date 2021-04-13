<?php

/**
 * Plugin Name: Social Links by Alex
 * Description: Adds social icons with profiles
 * Version: 1.0
 * Author: Alex Nik
 * Text Domain: sl
 *
 */

// Exit if Accessed Directly

if (!defined('ABSPATH')) {
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-class.php');

// Register Widget
function register_social_links()
{
    register_widget('Social_Links_Widget');
}

add_action('widgets_init', 'register_social_links');