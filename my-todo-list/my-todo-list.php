<?php

/**
 * Plugin Name: My TODO List by Alex
 * Description: TODO LIST
 * Version: 1.0
 * Author: Alex Nik
 * Text Domain: todo_domain
 *
 */

// Exit if Accessed Directly

if (!defined('ABSPATH')) {
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-scripts.php');

// Load Shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-shortcodes.php');

//Check if admin
if (is_admin()) {
    // Load Custom Post Type
    require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-cpt.php');

    // Load Additional Fields
    require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-fields.php');
}

// Load Class
//require_once(plugin_dir_path(__FILE__) . '/includes/newsletter-subscriber-class.php');

// Register Widget
/*function register_newsletter_subscriber()
{
    register_widget('Newsletter_Subscriber_Widget');
}

add_action('widgets_init', 'register_newsletter_subscriber');*/