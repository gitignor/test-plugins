<?php
class Social_Links_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        /*$widget_ops = array(
            'classname' => 'my_widget',
            'description' => 'My Widget is awesome',
        );
        parent::__construct('my_widget', 'My Widget', $widget_ops);*/
        parent::__construct(
            'social_links_widget', // Base ID
            esc_html__('Social Links Title', 'sl'), // Name
            array('description' => esc_html__('A Social Links Widget', 'sl'),) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $links = array(
            'facebook' => esc_attr($instance['facebook_link']),
            'twitter' => esc_attr($instance['twitter_link']),
            'instagram' => esc_attr($instance['instagram_link'])
        );

        $icons = array(
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'instagram' => esc_attr($instance['instagram_icon'])
        );

        $icon_width = $instance['icon_width'];

        echo $args['before_widget'];
        // Call Frontend Function
        $this->getSocialLink($links, $icons, $icon_width);
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        // Call Form Function
        $this->getForm($instance);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = array(
            'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '',
            'twitter_link' => (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '',
            'instagram_link' => (!empty($new_instance['instagram_link'])) ? strip_tags($new_instance['instagram_link']) : '',
            'facebook_icon' => (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '',
            'twitter_icon' => (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '',
            'instagram_icon' => (!empty($new_instance['instagram_icon'])) ? strip_tags($new_instance['instagram_icon']) : '',
            'icon_width' => (!empty($new_instance['icon_width'])) ? strip_tags($new_instance['icon_width']) : ''
        );

        return $instance;
    }

    /**
     * Gets and Displays Form
     *
     * @param array $instance The widget options
     */
    public function getForm($instance)
    {
        // Get Facebook Link
        if (isset($instance['facebook_link'])) {
            $facebook_link = esc_attr($instance['facebook_link']);
        } else {
            $facebook_link = 'https://facebook.com';
        }

        // Get Twitter Link
        if (isset($instance['twitter_link'])) {
            $twitter_link = esc_attr($instance['twitter_link']);
        } else {
            $twitter_link = 'https://twitter.com';
        }

        // Get Instagram Link
        if (isset($instance['instagram_link'])) {
            $instagram_link = esc_attr($instance['instagram_link']);
        } else {
            $instagram_link = 'https://instagram.com';
        }

        // Icons

        // Get Facebook Icon
        if (isset($instance['facebook_icon'])) {
            $facebook_icon = esc_attr($instance['facebook_icon']);
        } else {
            $facebook_icon = plugins_url() . '/social-links-sl/img/facebook.png';
        }

        // Get Twitter Icon
        if (isset($instance['twitter_icon'])) {
            $twitter_icon = esc_attr($instance['twitter_icon']);
        } else {
            $twitter_icon = plugins_url() . '/social-links-sl/img/twitter.png';
        }

        // Get Instagram Icon
        if (isset($instance['instagram_icon'])) {
            $instagram_icon = esc_attr($instance['instagram_icon']);
        } else {
            $instagram_icon = plugins_url() . '/social-links-sl/img/instagram.png';
        }

        // Get Icons Size
        if (isset($instance['icon_width'])) {
            $icon_width = esc_attr($instance['icon_width']);
        } else {
            $icon_width = 32;
        }
?>
<h4><?php _e('Facebook', 'sl'); ?></h4>
<p>
    <label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Link:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook_link'); ?>"
        name="<?php echo $this->get_field_name('facebook_link') ?>" value="<?php echo esc_attr($facebook_link); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php _e('Icon:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook_icon'); ?>"
        name="<?php echo $this->get_field_name('facebook_icon') ?>" value="<?php echo esc_attr($facebook_icon); ?>">
</p>

<h4><?php _e('Twitter', 'sl'); ?></h4>
<p>
    <label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Link:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>"
        name="<?php echo $this->get_field_name('twitter_link') ?>" value="<?php echo esc_attr($twitter_link); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php _e('Icon:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_icon'); ?>"
        name="<?php echo $this->get_field_name('twitter_icon') ?>" value="<?php echo esc_attr($twitter_icon); ?>">
</p>

<h4><?php _e('Instagram', 'sl'); ?></h4>
<p>
    <label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Link:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>"
        name="<?php echo $this->get_field_name('instagram_link') ?>" value="<?php echo esc_attr($instagram_link); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('instagram_icon'); ?>"><?php _e('Icon:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_icon'); ?>"
        name="<?php echo $this->get_field_name('instagram_icon') ?>" value="<?php echo esc_attr($instagram_icon); ?>">
</p>

<h4><?php _e('Icons size', 'sl'); ?></h4>
<p>
    <label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php _e('Icons width:', 'sl'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('icon_width'); ?>"
        name="<?php echo $this->get_field_name('icon_width') ?>" value="<?php echo esc_attr($icon_width); ?>">
</p>
<?php
    }

    /**
     * Gets and Displays Social Icons
     *
     * @param array $links Social Links
     * @param array $icons Social Icons
     * @param array $icon_width Social Icons Size
     */
    public function getSocialLink($links, $icons, $icon_width)
    { ?>
<div class="social-links">
    <a class="" target="_blank" href="<?php echo esc_attr($links['facebook']); ?>">
        <img src="<?php echo esc_attr($icons['facebook']); ?>" alt="" width="<?php echo esc_attr($icon_width); ?>">
    </a>

    <a class="" target="_blank" href="<?php echo esc_attr($links['twitter']); ?>">
        <img src="<?php echo esc_attr($icons['twitter']); ?>" alt="" width="<?php echo esc_attr($icon_width); ?>">
    </a>

    <a class="" target="_blank" href="<?php echo esc_attr($links['instagram']); ?>">
        <img src="<?php echo esc_attr($icons['instagram']); ?>" alt="" width="<?php echo esc_attr($icon_width); ?>">
    </a>
</div>
<?php
    }
}