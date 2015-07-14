<?php
/**
 * Woocommerce functions and definitions
 *
 * @package nps
 */

function woocommerce_cart_link() {
    global $woocommerce;
    ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'npstheme'); ?>" class="cart-parent">
        <!--
            <span class="contents"><?php echo $woocommerce->cart->get_cart_contents_count() ?></span>
            <span class="total"><?php echo $woocommerce->cart->get_cart_total() ?></span>
        -->
        <i class="glyphicon glyphicon-shopping-cart"></i>
    </a>
    <?php
}

function woocommerce_my_account_link() {
     if ( is_user_logged_in() ) { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','npstheme'); ?>" class="my-account"><i class="glyphicon glyphicon-user"></i></a>
     <?php } 
     else { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','npstheme'); ?>" class="my-account"><i class="glyphicon glyphicon-user"></i></a>
     <?php }
}

function get_main_user_bar() {
    if ( class_exists( 'woocommerce' ) ) {?>
        <div class="user-nav"> <?php
        woocommerce_my_account_link();
        woocommerce_cart_link();?>
        <button id="trigger-search-overlay" type="button" class="glyphicon glyphicon-search search-btn"></button>
        </div> <?php
    }
}

function get_main_sticky_menu() { ?>
    <div class="sticky-menu">
        <img src="<?php echo get_template_directory_uri(); ?>/includes/img/logo.png" class="logo"/>
        <?php
            if(is_active_sidebar('top-bar')){
                dynamic_sidebar('top-bar');
            }
        ?>
    </div><?php
}

function get_header_inner_image($context = '') { ?>
    <div class="row">
        <div class="site-header-inner col-12"> <?php
    if (!empty($context)) {
        $header_image = get_template_directory_uri().'/includes/img/header/'.$context.'.jpg';
    } else {
        $header_image = get_header_image();
    }
    if ( ! empty( $header_image ) ) { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php echo esc_url($header_image); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        </a>
    <?php } ?>
      </div>
    </div><?php
}

function get_site_header_navigation($theme_location = '') { ?>
    <nav class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="site-navigation-inner col-12">
                    <div class="navbar">
                        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
    
                        <!-- The WordPress Menu goes here -->
                           <?php wp_nav_menu(
                                array(
                                    'theme_location' => $theme_location,
                                    'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => '',
                                    'menu_id' => 'main-menu',
                                    'walker' => new wp_bootstrap_navwalker()
                                )
                            ); ?>
                    
                    </div><!-- .navbar -->
                </div>
            </div>
        </div><!-- .container -->
    </nav><!-- .site-navigation -->
    <?php
}

function get_before_body() { ?>
    <div class="main-content">  
    <div class="container">
        <div class="row">
            <div class="main-content-inner col-12"> <?php
}
