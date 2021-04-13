<?php

// Add Scripts
function ffl_add_scripts()
{
    wp_enqueue_style('ffl-main-style', plugins_url() . '/facebook-footer-link/css/style.css', array(), '1.0');
    wp_enqueue_script('ffl-main-script', plugins_url() . '/facebook-footer-link/js/main.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'ffl_add_scripts');