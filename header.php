<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


/**
 * Next Steps: layout of the header main nav
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,700i|Ruge+Boogie" rel="stylesheet">
    </head>
    <body <?php body_class(); ?>>
    <?php do_action( 'foundationpress_after_body' ); ?>

    <?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
    <?php endif; ?>

    <?php do_action( 'foundationpress_layout_start' ); ?>

    <header id="masthead" class="site-header" role="banner">
        <div class="title-bar align-right" data-responsive-toggle="site-navigation">
            <div class="title-bar-title">
                <h1 class="header-logo"><span class="show-for-sr"><?php bloginfo( 'name' ); ?></span>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo" />
                        
                        <!-- TODO: make this content editable? -->
                    </a>
                </h1>
            </div>
            <!-- TODO: make this link a variable to the shop link. Don't really want this hard-coded -->
            <a style="margin-bottom: 0;" href="wordpress/shop" class="button">Shop Online</a>
            <button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
        </div>

        <div class="top-bar show-for-medium">
            <div class="top-bar-left">
                <div class="menu">
                    <h1 class="header-logo"><span class="show-for-sr"><?php bloginfo( 'name' ); ?></span>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo" />
                            <!-- TODO: make this content editable? -->
                        </a>
                    </h1>
                </div>
            </div>
            <div class="top-bar-right text-right">
                <?php if ( is_user_logged_in() ) { ?>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a> / 
                    <a href="/my-account/customer-logout">Log Out</a>
                                    <!-- Shopping Cart Desktop -->
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

                 <?php } 
                 else { ?>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
                 <?php } ?>


                <?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
                    <?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
                <?php endif; ?>
            </div>
        </div>
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <!--  -->
            <?php foundationpress_top_bar_r(); ?>
        </nav>
    </header>

    <section class="container">
        <?php do_action( 'foundationpress_after_header' );
