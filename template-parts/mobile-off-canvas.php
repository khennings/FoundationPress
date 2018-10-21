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
