<?php
/**
 * nps Theme Customizer
 *
 * @package nps
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nps_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    nps_customize_pages($wp_customize);
    nps_customize_categories($wp_customize);
    nps_customize_events_categories($wp_customize);

    $wp_customize->add_section('home_slider_section' , array(
        'title' => __('Home Slider','nps'),
    ));
    $wp_customize->add_setting('home_slider_id', array());
    $wp_customize->add_control('my_home_slider_id', array(
      'label'      => __('Home page slider ID', 'nps'),
      'section'    => 'home_slider_section',
      'settings'   => 'home_slider_id',
      'type'       => 'input',
    ));
}
add_action( 'customize_register', 'nps_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nps_customize_preview_js() {
	wp_enqueue_script( 'nps_customizer', get_template_directory_uri() . '/includes/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'nps_customize_preview_js' );


function nps_customize_pages( $wp_customize ) {
    $wp_customize->add_setting('rac_page', array());
    $wp_customize->add_setting('wie_page', array());
    $wp_customize->add_setting('mr_page', array());
    $wp_customize->add_setting('mm_page', array());
    $wp_customize->add_section('root_pages_section' , array(
        'title' => __('Root pages','nps'),
    ));

    $pages = array();
    foreach (get_pages() as $page) {
        $pages[$page->ID] = $page->post_title;
    }

    $wp_customize->add_control('root_page_rac', array(
      'label'      => __('Raciborowice page', 'nps'),
      'section'    => 'root_pages_section',
      'settings'   => 'rac_page',
      'type'       => 'select',
      'choices'    => $pages
    ));
    $wp_customize->add_control('root_page_wie', array(
      'label'      => __('Więcławice page', 'nps'),
      'section'    => 'root_pages_section',
      'settings'   => 'wie_page',
      'type'       => 'select',
      'choices'    => $pages
    ));
    $wp_customize->add_control('root_page_mr', array(
      'label'      => __('Marathon results', 'nps'),
      'section'    => 'root_pages_section',
      'settings'   => 'mr_page',
      'type'       => 'select',
      'choices'    => $pages
    ));
    $wp_customize->add_control('root_page_mm', array(
      'label'      => __('Marathon map', 'nps'),
      'section'    => 'root_pages_section',
      'settings'   => 'mm_page',
      'type'       => 'select',
      'choices'    => $pages
    ));
}

function nps_customize_categories( $wp_customize ) {
    $wp_customize->add_setting('ck_category', array());
    $wp_customize->add_setting('library_category', array());
    $wp_customize->add_setting('library_books_category', array());
    $wp_customize->add_setting('marathon_category', array());
    $wp_customize->add_setting('cinema_category', array());
    $wp_customize->add_section('root_categories_section' , array(
        'title' => __('Root posts categories','nps'),
    ));

    $categories = array();
    foreach (get_categories(array('hide_empty' => 0)) as $category) {
        $categories[$category->cat_ID] = $category->cat_name;
    }

    $wp_customize->add_control('root_category_ck', array(
      'label'      => __('Culture center category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'ck_category',
      'type'       => 'select',
      'choices'    => $categories
    ));
    $wp_customize->add_control('root_category_library', array(
      'label'      => __('Library category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'library_category',
      'type'       => 'select',
      'choices'    => $categories
    ));
    $wp_customize->add_control('root_category_books_library', array(
      'label'      => __('Library new books category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'library_books_category',
      'type'       => 'select',
      'choices'    => $categories
    ));
    $wp_customize->add_control('root_category_marathon', array(
      'label'      => __('Marathon category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'marathon_category',
      'type'       => 'select',
      'choices'    => $categories
    ));
    $wp_customize->add_control('root_category_cinema', array(
      'label'      => __('Cinema category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'cinema_category',
      'type'       => 'select',
      'choices'    => $categories
    ));
}

function nps_customize_events_categories( $wp_customize ) {
    $wp_customize->add_setting('ckip_event_category', array());
    $wp_customize->add_setting('ckip_workshops_category', array());
    $wp_customize->add_setting('library_event_category', array());
    $wp_customize->add_setting('cinema_event_category', array());
    $wp_customize->add_section('root_events_categories_section' , array(
        'title' => __('Root events categories','nps'),
    ));
    $events_categories = array();
    foreach (get_terms("tribe_events_cat", array('hide_empty' => false)) as $ec) {
        $events_categories[$ec->slug] = $ec->name;
    }

    $wp_customize->add_control('root_ckip_event_category', array(
      'label'      => __('CKiP events category', 'nps'),
      'section'    => 'root_events_categories_section',
      'settings'   => 'ckip_event_category',
      'type'       => 'select',
      'choices'    => $events_categories
    ));
    $wp_customize->add_control('root_ckip_workshops_event_category', array(
      'label'      => __('CKiP workshops category', 'nps'),
      'section'    => 'root_events_categories_section',
      'settings'   => 'ckip_workshops_category',
      'type'       => 'select',
      'choices'    => $events_categories
    ));
    $wp_customize->add_control('root_library_event_category', array(
      'label'      => __('Library events category', 'nps'),
      'section'    => 'root_events_categories_section',
      'settings'   => 'library_event_category',
      'type'       => 'select',
      'choices'    => $events_categories
    ));
    $wp_customize->add_control('root_cinema_event_category', array(
      'label'      => __('Cinema events category', 'nps'),
      'section'    => 'root_events_categories_section',
      'settings'   => 'cinema_event_category',
      'type'       => 'select',
      'choices'    => $events_categories
    ));
}
