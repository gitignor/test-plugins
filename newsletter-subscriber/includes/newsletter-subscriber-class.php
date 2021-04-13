<?php
class Newsletter_Subscriber_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct(
            'newsletter_subscriber_widget', // Base ID
            esc_html__('Newsletter Subscriber Title', 'ns_domain'), // Name
            array('description' => esc_html__('A Newsletter Subscriber Widget', 'ns_domain'),) // Args
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
        echo $args['before_widget'];

        echo $args['before_title'];
        if (!empty($instance['title'])) :
            _e($instance['title'], 'ns_domain');
        endif;
        echo $args['after_title'];

?>

<div id="form-msg"></div>
<form method="post"
    action="<?php echo plugins_url() . '/newsletter-subscriber/includes/newsletter-subscriber-mailer.php'; ?>"
    id="subscriber-form">
    <div class="form-group">
        <label for="name"><?php _e('Name:', 'ns_domain'); ?></label><br>
        <input type="text" name="name" id="name" class="form-control" required value="">
    </div>
    <div class="form-group">
        <label for="email"><?php _e('E-mail:', 'ns_domain'); ?></label><br>
        <input type="email" name="email" id="email" class="form-control" required value="">
    </div><br>
    <input type="hidden" name="recipient" value="<?php echo esc_attr($instance['recipient']); ?>">
    <input type="hidden" name="subject" value="<?php echo esc_attr($instance['subject']); ?>">
    <input type="submit" name="subscruber_submit" value="Subscribe" class="btn button-primary">
</form>



<?php
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Newsletter Subscriber', 'ns_domain');
        $recipient = $instance['recipient'];
        $subject = !empty($instance['subject']) ? $instance['subject'] : __('New Subscriber', 'ns_domain');

    ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'ns_domain'); ?></label><br>
    <input type="text" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
</p>

<p>
    <label for="<?php echo $this->get_field_id('recipient'); ?>"><?php _e('Recipient:', 'ns_domain'); ?></label><br>
    <input type="text" id="<?php echo $this->get_field_id('recipient'); ?>"
        name="<?php echo $this->get_field_name('recipient'); ?>" value="<?php echo esc_attr($recipient); ?>">
</p>

<p>
    <label for="<?php echo $this->get_field_id('subject'); ?>"><?php _e('Subject:', 'ns_domain'); ?></label><br>
    <input type="text" id="<?php echo $this->get_field_id('subject'); ?>"
        name="<?php echo $this->get_field_name('subject'); ?>" value="<?php echo esc_attr($subject); ?>">
</p>

<?php

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
        $instance = array(
            'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
            'recipient' => (!empty($new_instance['recipient'])) ? strip_tags($new_instance['recipient']) : '',
            'subject' => (!empty($new_instance['recipient'])) ? strip_tags($new_instance['subject']) : ''
        );

        return $instance;
    }
}