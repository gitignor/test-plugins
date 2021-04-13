<?php

// List Videos

function yvg_list_videos($atts, $content = null)
{
    global $post;

    $atts = shortcode_atts(array(
        'title' => 'Video Gallery',
        'count' => 20,
        'category' => 'all'
    ), $atts);

    // Check category attribute
    if ($atts['category'] == 'all') {
        $terms = '';
    } else {
        $terms = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $atts['category']
            )
        );
    }

    // Query Args
    $args = array(
        'post_type'     => 'video',
        'post_status'   => 'publish',
        'order_by'      => 'created',
        'order'         => 'DESC',
        'post_per_page' => $atts['count'],
        'tax_query'     => $terms
    );

    // Fetch Todos
    $videos = new WP_Query($args);

    // Check For Todos
    if ($videos->have_posts()) {
        // Get category
        $category = str_replace('-', ' ', $atts['category']);
        //$category = strtolower($category);

        // Init output
        $output = '';

        // Build output
        $output .= '<div class="video-list">';

        while ($videos->have_posts()) {
            $videos->the_post();

            // Get field value
            $video_id = get_post_meta($post->ID, 'video_id', true);
            $details = get_post_meta($post->ID, 'details', true);

            $output .= '<div class="yvg-video">';
            $output .= '<h4>' . get_the_title() . '</h4>';

            if (get_option('yvg_setting_disable_fullscreen')) {
                $output .= '<iframe width="560" height="315"
                    src="https://www.youtube.com/embed/' . $video_id . '"
title="YouTube video player" frameborder="0"
allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
>
</iframe>';
            } else {
                $output .= '<iframe width="560" height="315"
                    src="https://www.youtube.com/embed/' . $video_id . '"
title="YouTube video player" frameborder="0"
allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
allowfullscreen>
</iframe>';
            }

            $output .= '<div>' . $details . '</div>';
            $output .= '</div><br></hr>';
        }

        $output .= '</div>';

        // Reset Post Data
        wp_reset_postdata();

        return $output;
    } else {
        return '<p>No Videos</p>';
    }
}

add_shortcode('videos', 'yvg_list_videos');