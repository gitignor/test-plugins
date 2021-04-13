<?php

// Add scripts to Admin

if (is_admin()) {
    function todo_add_admin_scripts()
    {
        wp_enqueue_style('todo-admin-style', plugins_url() . '/my-todo-list/css/style-admin.css');
        //wp_enqueue_script('todo-admin-script', plugins_url() . '/my-todo-list/js/main.js', array(), '1.0', true);
    }

    add_action('admin_init', 'todo_add_admin_scripts');
}

// Add scripts to Frontend
function todo_add_scripts()
{
    wp_enqueue_style('todo-main-style', plugins_url() . '/my-todo-list/css/style.css');
    wp_enqueue_script('todo-main-script', plugins_url() . '/my-todo-list/js/main.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'todo_add_scripts');