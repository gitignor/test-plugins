<?php

/**
 * Wordpress Github Repos Class
 */
class WP_My_Github_Repos extends WP_Widget
{

    // Create Widget
    function __construct()
    {
        parent::__construct(
            'my_github_repos', // Base ID
            esc_html__('My Github Repos', 'git_domain'), // Name
            array('description' => esc_html__('It\'s My GitHub Repos Widget', 'git_domain'),) // Args
        );
    }

    // Frontend Display
    public function widget($args, $instance)
    {
        // Get Values
        $title    = apply_filters('widget_title', $instance['title']);
        $username = esc_attr($instance['username']);
        $count    = esc_attr($instance['count']);

        echo $args['before_widget'];

        echo $args['before_title'];
        if (!empty($instance['title'])) :
            _e($title, 'git_domain');
        endif;
        echo $args['after_title'];

        echo $this->showRepos($title, $username, $count);

        echo $args['after_widget'];
    }

    // Backend Form
    public function form($instance)
    {
        // Get Title
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('My GitHub repos', 'git_domain');
        }

        // Get Username
        if (isset($instance['username'])) {
            $username = $instance['username'];
        } else {
            $username = __('gitignor', 'git_domain');
        }

        // Get Repos count
        if (isset($instance['count'])) {
            $count = $instance['count'];
        } else {
            $count = 5;
        }
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'git_domain'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_html($title); ?>">
</p>

<p>
    <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:', 'git_domain'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('username'); ?>"
        name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo esc_html($username); ?>">
</p>

<p>
    <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count:', 'git_domain'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('count'); ?>"
        name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo esc_html($count); ?>">
</p>

<?php
    }

    // Update Widget Values
    public function update($new_instance, $old_instance)
    {
        $instance = array(
            'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
            'username' => (!empty($new_instance['username'])) ? strip_tags($new_instance['username']) : '',
            'count' => (!empty($new_instance['count'])) ? strip_tags($new_instance['count']) : ''
        );

        return $instance;
    }

    public function showRepos($title, $username, $count)
    {
        $url = "https://api.github.com/users/$username/repos?sort=created&per_page=$count";
        $options = array(
            'http' => array(
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $repos = json_decode($response);

        // Build Output
        $output = '<ul class="repos">';

        foreach ($repos as $repo) {
            $output .= '<li>
            <div class="repo-title">' . $repo->name . '</div>
            <div class="repo-desc">' . $repo->description . '</div>
            <a target="_blank" class="repo-link" href="' . $repo->html_url . '">View on GitHub</a>
            </li>';
        }

        $output .= '</ul>';

        return  $output;
    }
}