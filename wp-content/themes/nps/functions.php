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
    ) );

    show_admin_bar(false);
}
endif; // nps_setup
add_action( 'after_setup_theme', 'nps_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function nps_widgets_init() {
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
    wp_enqueue_style( 'nps-font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

    wp_enqueue_style( 'nps-style', get_stylesheet_uri() );

    // load bootstrap js
    wp_enqueue_script('nps-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

    // load bootstrap wp js
    wp_enqueue_script( 'nps-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

    wp_enqueue_script( 'nps-modernizer', get_template_directory_uri() . '/includes/js/modernizr.custom.js', array() );

    wp_enqueue_script( 'nps-classie', get_template_directory_uri() . '/includes/js/classie.js', array() );

	wp_enqueue_script( 'nps-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

    //wp_enqueue_script( 'nps-sticky', get_template_directory_uri() . '/includes/js/sticky.js', array('jquery') );
    wp_enqueue_script( 'nps-slickjs', get_template_directory_uri() . '/includes/resources/slick/slick.js', array('jquery') );

    wp_enqueue_script( 'nps-sticky-nav', get_template_directory_uri() . '/includes/js/sticky-navbar.min.js', array('jquery') );
    wp_enqueue_style( 'nps-sticky-nav-css', get_template_directory_uri() . '/includes/css/animate.min.css' );

    wp_enqueue_style( 'nps-slick-css', get_template_directory_uri() . '/includes/resources/slick/slick.css' );
    wp_enqueue_style( 'nps-slick-css-theme', get_template_directory_uri() . '/includes/resources/slick/slick-theme.css' );

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
}
add_action( 'wp_enqueue_scripts', 'nps_scripts' );

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
