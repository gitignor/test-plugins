<?php

// Add scripts to Admin

if (is_admin()) {
    function youtube_add_admin_scripts()
    {
        wp_enqueue_style('youtube-admin-style', plugins_url() . '/youtube-vid-gallery/css/style-admin.css');
        wp_enqueue_script('youtube-main-script', plugins_url() . '/youtube-vid-gallery/js/main.js', array('jquery'), '1.0', true);
    }

    add_action('admin_init', 'youtube_add_admin_scripts');
}

// Add scripts to Frontend
function youtube_add_scripts()
{
    wp_enqueue_style('youtube-main-style', plugins_url() . '/youtube-vid-gallery/css/style.css');
    wp_enqueue_script('youtube-main-script', plugins_url() . '/youtube-vid-gallery/js/main.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'youtube_add_scripts');
