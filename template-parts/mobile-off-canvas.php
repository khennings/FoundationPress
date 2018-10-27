<?php
/**
 * Template part for off canvas menu
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="off-canvas position-right" id="mobile-menu" data-off-canvas data-auto-focus="false" data-position="left" role="navigation">

  <?php foundationpress_mobile_nav(); ?>
	<div class="login-reg">
    <!-- Shopping Cart mobile -->
    <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
     
        $count = WC()->cart->cart_contents_count;
        ?>
        <br/>
        <span class="cart-icon-wrapper">
            <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
            
            <?php 
            if ( $count > 0 ) {
                ?>

                <span class="cart-contents-count"><?php echo esc_html( $count ); ?> </span>
                <?php
            }
                ?></a>
            <span class="cart-icon"></span>
        </span>
     
    <?php } ?>
		<?php if ( is_user_logged_in() ) { ?>
          <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
          <a href="/my-account/customer-logout">Log Out</a>
       <?php } 
       else { ?>
          <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
       <?php } ?>
   </div>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
