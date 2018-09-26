<?php
/*
Plugin Name: WooCommerce Product Tagline
Plugin URI: https://willgorham.com/
Description: Adds a short product tagline to WooCommerce products.
Version: 1.0.1
Author: Will Gorham
Author URI: https://willgorham.com/
Copyright: Will Gorham
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

class WCPT {

  /* Plugin version. */
  const VERSION = '1.0.1';

  /**
   * @var WCPT - the single instance of the class.
   *
   * @since 1.0.0
   */
  protected static $instance = null;

  /**
   * Cloning is forbidden.
   *
   * @since 1.0.0
   */
  protected function __clone() {
    _doing_it_wrong( __FUNCTION__, 'Nah.', '1.0.0' );
  }

  /**
   * Unserializing instances of this class is forbidden.
   *
   * @since 1.0.0
   */
  protected function __wakeup() {
    _doing_it_wrong( __FUNCTION__, 'Nah.', '1.0.0' );
  }

  /**
   * Do some work.
   *
   * @since 1.0.0
   */
  private function __construct() {

    add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
  }

  /**
   * Main WCPT Instance.
   *
   * Ensures only one instance of WCPT is loaded or can be loaded.
   *
   * @static
   * @see wcpt()
   * @return WCPT - Main instance
   * @since 1.0.0
   */
  public static function getInstance() {

    if ( is_null( self::$instance ) ) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  /**
   * Start making things happen.
   *
   * @since  1.0.0
   */
  public function plugins_loaded() {

    require_once( 'includes/class-wcpt-public.php' );

    if ( is_admin() ) {
      require_once( 'includes/class-wcpt-admin.php' );
    }

  }

}


/**
 *  Returns the singleton WCPT object.
*
*  @since   1.0.0
*  @return  WCPT
*/
function wcpt() {
  return WCPT::getInstance();
}


// Initialize this thing.
$GLOBALS[ 'wcpt' ] = wcpt();
