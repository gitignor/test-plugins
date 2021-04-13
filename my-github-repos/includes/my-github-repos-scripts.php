<?php

// Add scripts

function git_add_scripts()
{
    wp_enqueue_style('git-main-style', plugins_url() . '/my-github-repos/css/style.css');
    wp_enqueue_script('git-main-script', plugins_url() . '/my-github-repos/js/main.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'git_add_scripts');