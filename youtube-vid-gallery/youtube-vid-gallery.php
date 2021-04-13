<?php

/**
 * Plugin Name: My Youtube Gallery by Alex
 * Plugin URI: https://aleksei.one/youtube
 * Description: Add a YouTube video gallery to your website
 * Version: 1.0
 * Author: Alex Nik
 * Author URI: https://aleksei.one
 * Text Domain: youtube_domain
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Domain Path: /languages
 * Requires at least: 4.9
 * Requires PHP: 5.2.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

// Exit if Accessed Directly

if (!defined('ABSPATH')) {
    exit;
}

require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-scripts.php');

require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-shortcodes.php');

if (is_admin()) {
    // Load Custom Post Type
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-cpt.php');

    // Load Settings
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-settings.php');

    // Load Additional Fields
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-fields.php');
}
