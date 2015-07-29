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
    
    $wp_customize->add_setting('ck_category', array());
    $wp_customize->add_setting('library_category', array());
    $wp_customize->add_setting('library_books_category', array());
    $wp_customize->add_setting('marathon_category', array());
    $wp_customize->add_setting('cinema_category', array());
    $wp_customize->add_section('root_categories_section' , array(
        'title' => __('Root posts categories','nps'),
    ));
    $categories = get_categories(array(
        'hide_empty' => 0,
    ));
    $choices = array();
    foreach ($categories as $category) {
        $choices[$category->cat_ID] = $category->cat_name;
    }
    $wp_customize->add_control('root_category_ck', array(
      'label'      => __('Culture center category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'ck_category',
      'type'       => 'select',
      'choices'    => $choices
    ));
    $wp_customize->add_control('root_category_library', array(
      'label'      => __('Library category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'library_category',
      'type'       => 'select',
      'choices'    => $choices
    ));
    $wp_customize->add_control('root_category_books_library', array(
      'label'      => __('Library new books category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'library_books_category',
      'type'       => 'select',
      'choices'    => $choices
    ));
    $wp_customize->add_control('root_category_marathon', array(
      'label'      => __('Marathon category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'marathon_category',
      'type'       => 'select',
      'choices'    => $choices
    ));
    $wp_customize->add_control('root_category_cinema', array(
      'label'      => __('Cinema category', 'nps'),
      'section'    => 'root_categories_section',
      'settings'   => 'cinema_category',
      'type'       => 'select',
      'choices'    => $choices
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
