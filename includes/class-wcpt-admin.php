<?php
/**
 * WCPT_Admin class
 *
 * @package WooCommerce Product Tagline
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Admin and settings support.
 *
 * @version 1.0.0
 */
class WCPT_Admin {

  /**
   * Initialize class.
   */
  public static function init() {
    add_action( 'woocommerce_product_options_general_product_data', array( __CLASS__, 'add_tagline_field' ) );
    add_action( 'woocommerce_process_product_meta', array( __CLASS__, 'save_tagline_field' ) );
  }

  /**
   * Output custom tagline text field.
   */
  public static function add_tagline_field() {
    woocommerce_wp_textarea_input( array(
      'id' => '_tagline',
      'label' => 'Product Tagline',
      'description' => 'This tagline will be displayed in product listings (e.g. the Shop page).',
      'desc_tip' => 'true',
      'placeholder' => ''
    ) );
  }

  /**
   * Save tagline field data.
   *
   * @param int $post_id Post ID
   */
  public static function save_tagline_field( $post_id ) {
    $tagline_content = empty( $_POST['_tagline'] ) ? '' : sanitize_textarea_field( $_POST['_tagline'] );
    update_post_meta( $post_id, '_tagline', $tagline_content );
  }

}

WCPT_Admin::init();
