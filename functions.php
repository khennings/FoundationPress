<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Update the cart link in header */
require_once( 'library/cart-update.php' );

function disable_shipping_calc_on_cart( $show_shipping ) {
    return false;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

/**
 * @snippet       Add privacy policy tick box at checkout
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=19854
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.3.4
 */
 
add_action( 'woocommerce_review_order_before_submit', 'bbloomer_add_checkout_shipping_policy', 9 );
   
function bbloomer_add_checkout_shipping_policy() {
  
woocommerce_form_field( 'shipping_policy', array(
    'type'          => 'checkbox',
    'class'         => array('form-row shipping-accept'),
    'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required'      => true,
    'label'         => 'I agree to pay additional charges for shipping, typically about $1 per case ordered (some rural areas have additional shipping fees).',
)); 
  
}
  
// Show notice if customer does not tick
   
add_action( 'woocommerce_checkout_process', 'bbloomer_not_approved_privacy' );
  
function bbloomer_not_approved_privacy() {
    if ( ! (int) isset( $_POST['shipping_policy'] ) ) {
        wc_add_notice( __( 'Please acknowledge the Shipping Policy' ), 'error' );
    }
}

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

// remove default sorting dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_theme_support( 'post-thumbnails' );
