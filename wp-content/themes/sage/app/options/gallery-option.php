<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class GalleryOptions
{
    private $option_name = 'gallery_images';
    private $page_slug   = 'gallery-options';

    public function __construct()
    {
        add_action('admin_menu', [ $this, 'add_option_page' ]);
        add_action('admin_init', [ $this, 'register_settings' ]);

        // Enqueue scripts for media uploader
        add_action('admin_enqueue_scripts', [ $this, 'enqueue_media_scripts' ]);
    }

    public function add_option_page()
    {
        add_menu_page(
            __( 'Gallery Options', 'textdomain' ),
            __( 'Gallery', 'textdomain' ),
            'manage_options',
            $this->page_slug,
            [ $this, 'render_page' ],
            'dashicons-format-gallery',
            60
        );
    }

    public function register_settings()
    {
        register_setting(
            'gallery_options_group',
            $this->option_name,
            [
                'type'              => 'array',
                'sanitize_callback' => [ $this, 'sanitize_gallery' ],
                'default'           => []
            ]
        );
    }

    public function enqueue_media_scripts($hook)
    {
        // Only load media scripts on our Gallery Options page
        if ($hook !== 'toplevel_page_' . $this->page_slug) {
            return;
        }

        // ✅ This line enables wp.media
        wp_enqueue_media();

        // Also enqueue jQuery (usually already available)
        wp_enqueue_script('jquery');
    }

    public function sanitize_gallery( $input )
    {
        $clean = [];
        for ( $i = 0; $i < 8; $i++ ) {
            $clean[$i] = isset($input[$i]) ? absint($input[$i]) : '';
        }
        return $clean;
    }

    public function render_page()
    {
        $gallery = get_option( $this->option_name, [] );
        ?>
        <div class="wrap">
            <h1><?php _e('Gallery Options', 'textdomain'); ?></h1>
            <form method="post" action="options.php">
                <?php settings_fields('gallery_options_group'); ?>

                <table class="form-table">
                    <tbody>
                        <?php for ( $i = 0; $i < 8; $i++ ) :
                            $image_id = isset($gallery[$i]) ? $gallery[$i] : '';
                            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
                        ?>
                        <tr>
                            <th scope="row"><?php printf( __( 'Image %d', 'textdomain' ), $i+1 ); ?></th>
                            <td>
                                <div style="display:flex; gap:10px; align-items:center;">
                                    <img src="<?php echo esc_url($image_url ?: ''); ?>" alt="" style="width:80px;height:80px;object-fit:cover;background:#f0f0f0;">
                                    <input type="hidden" id="gallery-image-<?php echo $i; ?>" name="<?php echo $this->option_name; ?>[<?php echo $i; ?>]" value="<?php echo esc_attr($image_id); ?>">
                                    <button type="button" class="button select-gallery-image" data-target="gallery-image-<?php echo $i; ?>">
                                        <?php _e('Select Image', 'textdomain'); ?>
                                    </button>
                                    <button type="button" class="button remove-gallery-image" data-target="gallery-image-<?php echo $i; ?>">
                                        <?php _e('Remove', 'textdomain'); ?>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>

        <script>
        (function($){
            $(document).ready(function(){
                let frame;
                $('.select-gallery-image').on('click', function(e){
                    e.preventDefault();
                    const target = $(this).data('target');
                    const input = $('#' + target);
                    const img = input.prev('img');

                    if(frame) frame.close();
                    frame = wp.media({
                        title: 'Select or Upload Image',
                        button: { text: 'Use this image' },
                        multiple: false
                    });

                    frame.on('select', function(){
                        const attachment = frame.state().get('selection').first().toJSON();
                        input.val(attachment.id);
                        img.attr('src', attachment.sizes.thumbnail.url);
                    });

                    frame.open();
                });

                $('.remove-gallery-image').on('click', function(e){
                    e.preventDefault();
                    const target = $(this).data('target');
                    const input = $('#' + target);
                    const img = input.prev('img');
                    input.val('');
                    img.attr('src', '');
                });
            });
        })(jQuery);
        </script>
        <?php
    }
}

new GalleryOptions();
