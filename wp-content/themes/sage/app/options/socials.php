<?php

namespace App\Controllers;

class SocialOptions
{
    protected $option_name = 'theme_social_links';

    public function __construct()
    {
        add_action('admin_menu', [$this, 'register_options_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    /**
     * Register custom options page
     */
    public function register_options_page()
    {
        add_menu_page(
            __('Social Links', 'sage'),          // Page title
            __('Social Links', 'sage'),          // Menu title
            'manage_options',                    // Capability
            'social-links',                      // Menu slug
            [$this, 'render_page'],              // Callback
            'dashicons-share',                   // Icon
            60                                   // Position
        );
    }

    /**
     * Register settings fields
     */
    public function register_settings()
    {
        register_setting($this->option_name, $this->option_name);

        add_settings_section(
            'social_links_section',
            __('Manage your social media links', 'sage'),
            function () {
                echo '<p>Enter full URLs for each social media platform.</p>';
            },
            $this->option_name
        );

        $fields = [
            'tiktok'    => 'TikTok',
            'instagram' => 'Instagram',
            'facebook'  => 'Facebook',
        ];

        foreach ($fields as $key => $label) {
            add_settings_field(
                $key,
                $label,
                [$this, 'render_field'],
                $this->option_name,
                'social_links_section',
                ['key' => $key]
            );
        }
    }

    /**
     * Render individual input fields
     */
    public function render_field($args)
    {
        $options = get_option($this->option_name);
        $value   = esc_url($options[$args['key']] ?? '');
        ?>
        <input
            type="url"
            name="<?php echo esc_attr($this->option_name . '[' . $args['key'] . ']'); ?>"
            value="<?php echo esc_attr($value); ?>"
            placeholder="https://example.com"
            class="regular-text"
        />
        <?php
    }

    /**
     * Render the options page
     */
    public function render_page()
    {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Social Media Links', 'sage'); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields($this->option_name);
                do_settings_sections($this->option_name);
                submit_button(__('Save Links', 'sage'));
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Helper method to get links easily in front end
     */
    public static function get_links()
    {
        $defaults = [
            'tiktok'    => '',
            'instagram' => '',
            'facebook'  => '',
        ];

        return wp_parse_args(get_option('theme_social_links', []), $defaults);
    }
}
new SocialOptions();
