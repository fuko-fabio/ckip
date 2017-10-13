<?php
/**
 * nps functions and definitions
 *
 * @package nps
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'nps_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function nps_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
		
		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( 'nps_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	
    }

	load_theme_textdomain( 'nps', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/ 
    register_nav_menus( array(
        'home'  => __( 'Main home menu', 'nps' ),
        'ckip'  => __( 'Main ckip menu', 'nps' ),
        'library'  => __( 'Main library menu', 'nps' ),
        'marathon'  => __( 'Main marathon menu', 'nps' ),
        'cinema'  => __( 'Main cinema menu', 'nps' ),
    ) );

    show_admin_bar(false);
}
endif; // nps_setup
add_action( 'after_setup_theme', 'nps_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function nps_widgets_init() {
    register_widget('WP_Widget_NPS_Recent_Posts');
    
    register_sidebar( array(
        'name'          => __( 'Top menu bar', 'nps' ),
        'id'            => 'top-bar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'nps' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Posts Sidebar', 'nps' ),
        'id'            => 'posts-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 3',
        'id' => 'footer-sidebar-3',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'nps_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function nps_scripts() {
    // Import the necessary TK Bootstrap WP CSS additions
    wp_enqueue_style( 'nps-bootstrap-wp', get_template_directory_uri() . '/includes/css/bootstrap-wp.css' );

    // load bootstrap css
    wp_enqueue_style( 'nps-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

    // load Font Awesome css
    wp_enqueue_style( 'nps-font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', array(), '4.1.0' );

    // load bootstrap js
    wp_enqueue_script('nps-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

    // load bootstrap wp js
    wp_enqueue_script( 'nps-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

    wp_enqueue_script( 'nps-modernizer', get_template_directory_uri() . '/includes/js/modernizr.custom.js', array() );

    wp_enqueue_script( 'nps-classie', get_template_directory_uri() . '/includes/js/classie.js', array() );

	wp_enqueue_script( 'nps-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

    //wp_enqueue_script( 'nps-sticky', get_template_directory_uri() . '/includes/js/sticky.js', array('jquery') );
    wp_enqueue_script( 'nps-slick', get_template_directory_uri() . '/includes/resources/slick/slick.js', array('jquery') );

    //wp_enqueue_script( 'nps-sticky-nav', get_template_directory_uri() . '/includes/js/sticky-navbar.min.js', array('jquery') );
    wp_enqueue_script( 'nps-sticky-nav', get_template_directory_uri() . '/includes/js/jquery.stickyNavbar.js', array('jquery') );
    wp_enqueue_style( 'nps-sticky-nav', get_template_directory_uri() . '/includes/css/animate.min.css' );

    wp_enqueue_style( 'nps-slick', get_template_directory_uri() . '/includes/resources/slick/slick.css' );
    wp_enqueue_style( 'nps-slick-theme', get_template_directory_uri() . '/includes/resources/slick/slick-theme.css' );

    wp_enqueue_script( 'nps-slicknav', get_template_directory_uri() . '/includes/js/jquery.slicknav.min.js', array('jquery') );
    wp_enqueue_style( 'nps-slicknav', get_template_directory_uri() . '/includes/css/slicknav.min.css', array(), '1.0.3' );

    wp_enqueue_script( 'nps-scrollintoview', get_template_directory_uri() . '/includes/js/jquery.scrollintoview.min.js', array('jquery') );

    wp_enqueue_script( 'nps-tmpl', get_template_directory_uri() . '/includes/js/tmpl.min.js', array('jquery') );
    wp_enqueue_script( 'nps-fill-box', get_template_directory_uri() . '/includes/js/fill.box.js', array('jquery') );
    wp_enqueue_script( 'nps-main', get_template_directory_uri() . '/includes/js/main.js', array('jquery') );
    wp_enqueue_script( 'nps-newsletter', get_template_directory_uri() . '/includes/js/newsletter.js', array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'nps-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
    wp_enqueue_style( 'nps-extended-style', get_template_directory_uri().'/includes/css/nps.css', array(), '1.2.10' );
    wp_enqueue_style( 'nps-search-style', get_template_directory_uri().'/includes/css/search.css', array(), '1.0.2' );
    wp_enqueue_style( 'nps-style', get_stylesheet_uri(), array(), '1.2.0'  );
}
add_action( 'wp_enqueue_scripts', 'nps_scripts', 15 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter( 'woocommerce_payment_complete_order_status', 'virtual_order_payment_complete_order_status', 10, 2 );
 
function virtual_order_payment_complete_order_status( $order_status, $order_id ) {
  $order = new WC_Order( $order_id );
  if ( 'processing' == $order_status &&
       ( 'on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status ) ) {

    $virtual_order = null;

    if ( count( $order->get_items() ) > 0 ) {
      foreach( $order->get_items() as $item ) {
        if ( 'line_item' == $item['type'] ) {
          $_product = $order->get_product_from_item( $item );
 
          if ( ! $_product->is_virtual() ) {
            // once we've found one non-virtual product we know we're done, break out of the loop
            $virtual_order = false;
            break;
          } else {
            $virtual_order = true;
          }
        }
      }
    }
 
    // virtual order, mark as completed
    if ( $virtual_order ) {
      return 'completed';
    }
  }
 
  // non-virtual order, return original status
  return $order_status;
}

add_action( 'pre_get_posts', 'exclude_events_category' );

function exclude_events_category( $query ) {
    if ( $query->query_vars['eventDisplay'] == 'month' && $query->query_vars['post_type'] == TribeEvents::POSTTYPE && !is_tax(TribeEvents::TAXONOMY) && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'tax_query', array(
            array(
                'taxonomy' => TribeEvents::TAXONOMY,
                'field' => 'slug',
                'terms' => array(get_theme_mod('ckip_workshops_category', 'unknown'), get_theme_mod('cinema_event_category', 'unknown')),
                'operator' => 'NOT IN'
            )
            )
        );
    }
    return $query;
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Load woocommerce functions file.
 */
require get_template_directory() . '/includes/nps.php';

require get_template_directory() . '/includes/calendar.php';

require get_template_directory() . '/includes/nps_recent_posts_widget.php';

