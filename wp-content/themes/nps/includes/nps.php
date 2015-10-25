<?php
/**
 * Woocommerce functions and definitions
 *
 * @package nps
 */

function woocommerce_cart_link() {
    global $woocommerce;
    ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'nps'); ?>" class="cart-parent">
        <!--
            <span class="contents"><?php echo $woocommerce->cart->get_cart_contents_count() ?></span>
            <span class="total"><?php echo $woocommerce->cart->get_cart_total() ?></span>
        -->
        <i class="fa fa-shopping-cart"></i>
    </a>
    <?php
}

function woocommerce_my_account_link() {
     if ( is_user_logged_in() ) { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','nps'); ?>" class="my-account"><i class="fa fa-user"></i></a>
     <?php } 
     else { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','nps'); ?>" class="my-account"><i class="fa fa-user"></i></a>
     <?php }
}

function get_main_user_bar($context = '') {
    if ( class_exists( 'woocommerce' ) ) {?>
        <div class="user-nav">
            <?php if ($context == 'ckip') {?>
                <a href="http://bip.malopolska.pl/ckipwmichalowicach/Article/id,11332.html"><img src="<?php echo get_template_directory_uri().'/includes/img/bip_icon.png' ?>" /></a>
                <a href="https://www.facebook.com/centrumkulturyipromocji"><i class="fa fa-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCP7JemMUisMOiyNWirDEbXg"><i class="fa fa-youtube-play"></i></a>
            <?php } else if ($context == 'library') {?>
                <a href="http://bip.malopolska.pl/bpwmichalowicach/Article/id,11299.html"><img src="<?php echo get_template_directory_uri().'/includes/img/bip_icon.png' ?>" /></a>
                <a href="https://www.facebook.com/pages/Biblioteka-Publiczna-Gminy-Micha%C5%82owice/1651147045115439"><i class="fa fa-facebook"></i></a>
            <?php } else {?>
                
            <?php } ?>
            <?php woocommerce_cart_link(); ?>
            <button id="trigger-search-overlay" type="button" class="fa fa-search search-btn"></button>
            <?php woocommerce_my_account_link(); ?>
        </div> <?php
    }
}

function get_main_sticky_menu() { ?>
    <div class="sticky-menu">
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
        <img src="<?php echo esc_url($header_image); ?>" class="fill-box">
    <?php } ?>
      </div>
    </div><?php
}

function get_site_header_navigation($theme_location = '', $depth = 3) { ?>
    <nav class="site-navigation">
    <?php // substitute the class "container-fluid" below if you want a wider content area ?>
        <div class="container">
            <div class="row">
                <div class="site-navigation-inner">
                    <div class="navbar navbar-default">
                        <div class="navbar-header">
                            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only"><?php _e('Toggle navigation','nps') ?> </span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
    
                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'    => $theme_location,
                                'depth'             => $depth,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'menu_id'           => 'main-menu',
                                'walker'            => new wp_bootstrap_navwalker()
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


function get_category_posts($theme_cat_config_name, $msg, $count = 4) {
    $cat = get_theme_mod($theme_cat_config_name, '0');
    if ($cat != '0') :
        query_posts(array(
            'category__in'   => $cat,
            'posts_per_page' => $count,
        ));
        if (have_posts()) : while (have_posts()) : the_post();
            if ($count == 6) { ?>
                <div class="col-md-2 col-sm-4 col-xs-6 post">
            <?php } else { ?>
                <div class="col-md-3 col-sm-6 col-xs-12 post">
            <?php } ?>
                <div class="content" onclick="goTo('<?php echo get_permalink(); ?>')" >
                    <p class="title ellipsis"><?php the_title(); ?></p>
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', array('class' => 'fill-box')) ?>
                    <span class="preview touch-show"><?php the_excerpt(); ?></span>
                    <a href="<?php echo get_permalink(); ?>" class="btn btn-default touch-show"><?php _e( 'See more', 'nps' ); ?></a>
                    <?php nps_short_posted_on(); ?>
                </div>
            </div> <?php
            endwhile;
        else : ?>
            <div class="col-xs-12">
                <div class="alert alert-info"><?php echo $msg; ?></div>
            </div> <?php
        endif;
        wp_reset_query();
    else : ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php __( 'Theme not configured.', 'nps' ); ?></div>
        </div> <?php
    endif;
}

function get_newsletter_form() { ?>
    <div class="newsletter newsletter-subscription">
        <form method="post" action="<?php echo get_site_url(); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
            <div class="header">
                <?php _e( 'Newsletter', 'nps' ); ?>
            </div>
            <div class="info">
                <span><?php _e( 'Submit', 'nps' ); ?> </span><?php _e( 'your email to get updates from us.', 'nps' ); ?>
            </div>
            <div class="actions">
                <input class="newsletter-email" type="email" name="ne" placeholder="my.email@example.com" required>
                <input class="newsletter-submit" type="submit" value="<?php _e( 'Subscribe!', 'nps' ); ?>"/>
            </div>
        </form>
    </div> <?php
}

function get_bottom_footer($top_logo = 'library_logo_white.png', $bottom_logo = 'ck_logo_white.png') { ?>
    <div class="site-footer-bottom">
        <div class="container">
            <div class="site-footer-inner">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 logo">
                        <div class="row">
                            <div class="col-xs-12 top">
                                <?php if ($top_logo) { ?>
                                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri().'/includes/img/'.$top_logo; ?>" /></a>
                                <?php } ?>
                            </div>
                            <div class="col-xs-12 bottom">
                                <?php if ($bottom_logo) { ?>
                                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri().'/includes/img/'.$bottom_logo; ?>" /></a>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3 col-xs-6 footer-sidebar1 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-1')){
                            dynamic_sidebar('footer-sidebar-1');
                        }
                    ?>
                    </div>
                    <div class="col-sm-3 col-xs-6 footer-sidebar2 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-2')){
                        dynamic_sidebar('footer-sidebar-2');
                        }
                    ?>
                    </div>
                    <div class="col-sm-3 col-xs-6 footer-sidebar3 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-3')){
                            dynamic_sidebar('footer-sidebar-3');
                        }
                    ?>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-sm-8">
                        Copyright &copy; 2015 <a href="<?php echo get_site_url(); ?>" title="<?php _e( 'CKiP', 'nps' ); ?>"><?php _e( 'CKiP', 'nps' ); ?></a>
                    </div>
                
                    <div class="col-sm-4">
                        <a target="_blank" href="http://npsoftware.pl" title="nps software" class="author"><span class="cname">nps</span><span class="csoftware"> software</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php
}
