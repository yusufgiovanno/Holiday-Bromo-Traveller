<?php

namespace App\Controllers;

/**
 * Plugin Name: Review Custom Post Type
 * Description: Registers a "Review" custom post type with Country & Impressions fields.
 * Version: 1.0
 * Author: Vanno
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ReviewCPT {

    private $post_type = 'review';

    public function __construct() {
        // Hook registrations
        add_action('init',           [ $this, 'register_post_type' ]);
        add_action('add_meta_boxes', [ $this, 'add_meta_boxes'     ]);
        add_action('save_post',      [ $this, 'save_meta'          ]);
    }

    /**
     * Register Custom Post Type
     */
    public function register_post_type() {
        $labels = [
            'name'               => __( 'Reviews', 'textdomain' ),
            'singular_name'      => __( 'Review', 'textdomain' ),
            'menu_name'          => __( 'Reviews', 'textdomain' ),
            'add_new'            => __( 'Add New', 'textdomain' ),
            'add_new_item'       => __( 'Add New Review', 'textdomain' ),
            'edit_item'          => __( 'Edit Review', 'textdomain' ),
            'new_item'           => __( 'New Review', 'textdomain' ),
            'view_item'          => __( 'View Review', 'textdomain' ),
            'search_items'       => __( 'Search Reviews', 'textdomain' ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'show_ui'            => true,
            'menu_icon'          => 'dashicons-star-filled',
            'supports'           => [ 'title' ], // Only using title for "Name"
            'has_archive'        => true,
            'rewrite'            => [ 'slug' => 'reviews' ],
            'show_in_rest'       => true,
        ];

        register_post_type( $this->post_type, $args );
    }

    /**
     * Add Meta Boxes
     */
    public function add_meta_boxes() {
        add_meta_box(
            'review_details',
            __( 'Review Details', 'textdomain' ),
            [ $this, 'render_meta_box' ],
            $this->post_type,
            'normal',
            'default'
        );
    }

    /**
     * Render Meta Box HTML
     */
    public function render_meta_box( $post ) {
        $country      = get_post_meta( $post->ID, '_review_country', true );
        $impressions  = get_post_meta( $post->ID, '_review_impressions', true );

        wp_nonce_field( 'review_meta_nonce_action', 'review_meta_nonce' );
        ?>
        <p>
            <label for="review_country"><strong><?php _e( 'Country', 'textdomain' ); ?></strong></label><br>
            <input type="text" id="review_country" name="review_country"
                value="<?php echo esc_attr( $country ); ?>"
                style="width: 100%;" />
        </p>
        <p>
            <label for="review_impressions"><strong><?php _e( 'Impressions', 'textdomain' ); ?></strong></label><br>
            <textarea id="review_impressions" name="review_impressions" rows="5" style="width: 100%;"><?php echo esc_textarea( $impressions ); ?></textarea>
        </p>
        <?php
    }

    /**
     * Save Meta Box Data
     */
    public function save_meta( $post_id ) {
        // Check nonce
        if ( ! isset( $_POST['review_meta_nonce'] ) ||
             ! wp_verify_nonce( $_POST['review_meta_nonce'], 'review_meta_nonce_action' ) ) {
            return;
        }

        // Avoid autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // Check permissions
        if ( isset( $_POST['post_type'] ) && $this->post_type === $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_post', $post_id ) ) return;
        }

        // Save Country
        if ( isset( $_POST['review_country'] ) ) {
            update_post_meta( $post_id, '_review_country', sanitize_text_field( $_POST['review_country'] ) );
        }

        // Save Impressions
        if ( isset( $_POST['review_impressions'] ) ) {
            update_post_meta( $post_id, '_review_impressions', sanitize_textarea_field( $_POST['review_impressions'] ) );
        }
    }

}

// Initialize the class
new ReviewCPT();
