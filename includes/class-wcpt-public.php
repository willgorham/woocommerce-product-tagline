<?php
/**
 * WCPT_Public class
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
    add_action( 'woocommerce_shop_loop_item_title', array( __CLASS__, 'output_tagline' ), 20 );
  }

  /**
   * Print tagline field content.
   */
  public static function output_tagline() {
    $tagline_content = get_post_meta( get_the_ID(), '_tagline', true );

    echo '<div class="product-tagline"><em>';
    echo esc_html( $tagline_content );
    echo '</em></div>';
  }


}

WCPT_Admin::init();
