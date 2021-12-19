<?php

/**
* Theme function file
**/


// shorthand contants
// ------------------------------------------------------------------------
define('APPBUFFF_THEME', 'Appbuff Theme');
define('APPBUFFF_VERSION', '1.0.1');
define('APPBUFFF_MINWP_VERSION', '4.3');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('APPBUFFF_THEME_URI', get_template_directory_uri());
define('APPBUFFF_IMG', APPBUFFF_THEME_URI . '/assets/img');
define('APPBUFFF_CSS', APPBUFFF_THEME_URI . '/assets/css');
define('APPBUFFF_JS', APPBUFFF_THEME_URI . '/assets/js');


// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('APPBUFFF_THEME_DIR', get_parent_theme_file_path());
define('APPBUFFF_IMG_DIR', APPBUFFF_THEME_DIR . '/assets/img');
define('APPBUFFF_CSS_DIR', APPBUFFF_THEME_DIR . '/assets/css');
define('APPBUFFF_JS_DIR', APPBUFFF_THEME_DIR . '/assets/js');

define('APPBUFFF_CORE', APPBUFFF_THEME_DIR . '/core');
define('APPBUFFF_COMPONENTS', APPBUFFF_THEME_DIR . '/components');
define('APPBUFFF_EDITOR', APPBUFFF_COMPONENTS . '/editor');


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}


// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function _action_appbuff_setup() {

    // make the theme available for translation
    $lang_dir = APPBUFFF_THEME_DIR . '/languages';
    load_theme_textdomain('appbuff', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'gallery', 'video', 'audio'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);


    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'appbuff'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
	
}
add_action('after_setup_theme', '_action_appbuff_setup');



// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function _filter_appbuff_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', '_filter_appbuff_framework_customizations_path');


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( APPBUFFF_CORE . '/init.php');

require_once( APPBUFFF_COMPONENTS . '/elementor/elementor.php'); // elementor widgets


// function new_submenu_class($menu) {
//     $menu = preg_replace('/ class="sub-menu"/','/ class="nav-dropdown" /',$menu);
//     return $menu;
// }
// add_filter('wp_nav_menu','new_submenu_class');

// nav link class
function add_link_atts($atts) {
    $atts['class'] = "menu-links";
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

// Remove unused css library
add_action( 'wp_enqueue_scripts', 'appbuff_remove_unused_css_files', 9999 );
function appbuff_remove_unused_css_files() {
    wp_dequeue_style( 'elementor-global' );
    wp_deregister_style( 'elementor-global' );
}


//portfolio post type
function appbuff_portfolio() {
    $labels = array(
        'name'                  => _x( 'Portfolios', 'Post type general name', 'portfolio' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'portfolio' ),
        'menu_name'             => _x( 'Portfolios', 'Admin Menu text', 'portfolio' ),
        'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'portfolio' ),
        'add_new'               => __( 'Add New', 'portfolio' ),
        'add_new_item'          => __( 'Add New portfolio', 'portfolio' ),
        'new_item'              => __( 'New portfolio', 'portfolio' ),
        'edit_item'             => __( 'Edit portfolio', 'portfolio' ),
        'view_item'             => __( 'View portfolio', 'portfolio' ),
        'all_items'             => __( 'All portfolios', 'portfolio' ),
        'search_items'          => __( 'Search portfolios', 'portfolio' ),
        'parent_item_colon'     => __( 'Parent portfolios:', 'portfolio' ),
        'not_found'             => __( 'No portfolios found.', 'portfolio' ),
        'not_found_in_trash'    => __( 'No portfolios found in Trash.', 'portfolio' ),
        'featured_image'        => _x( 'Portfolio Cover Image', 'portfolio' ),
        'set_featured_image'    => _x( 'Set cover image', 'portfolio' ),
        'remove_featured_image' => _x( 'Remove cover image', 'portfolio' ),
        'use_featured_image'    => _x( 'Use as cover image', 'portfolio' ),
        'archives'              => _x( 'Portfolio archives', 'portfolio' ),
        'insert_into_item'      => _x( 'Insert into portfolio', 'portfolio' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this portfolio', 'portfolio' ),
        'filter_items_list'     => _x( 'Filter portfolios list', 'portfolio' ),
        'items_list_navigation' => _x( 'Portfolios list navigation', 'portfolio' ),
        'items_list'            => _x( 'Portfolios list', 'portfolio' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Portfolio custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'Portfolio', $args );
}
add_action( 'init', 'appbuff_portfolio' );

// Register Custom Taxonomy
function portfolio_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'appbuff' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'appbuff' ),
		'menu_name'                  => __( 'Category', 'appbuff' ),
		'all_items'                  => __( 'All Items', 'appbuff' ),
		'parent_item'                => __( 'Parent Item', 'appbuff' ),
		'parent_item_colon'          => __( 'Parent Item:', 'appbuff' ),
		'new_item_name'              => __( 'New Item Name', 'appbuff' ),
		'add_new_item'               => __( 'Add New Item', 'appbuff' ),
		'edit_item'                  => __( 'Edit Item', 'appbuff' ),
		'update_item'                => __( 'Update Item', 'appbuff' ),
		'view_item'                  => __( 'View Item', 'appbuff' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'appbuff' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'appbuff' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'appbuff' ),
		'popular_items'              => __( 'Popular Items', 'appbuff' ),
		'search_items'               => __( 'Search Items', 'appbuff' ),
		'not_found'                  => __( 'Not Found', 'appbuff' ),
		'no_terms'                   => __( 'No items', 'appbuff' ),
		'items_list'                 => __( 'Items list', 'appbuff' ),
		'items_list_navigation'      => __( 'Items list navigation', 'appbuff' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'show_in_rest'               => true
	);
	register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $args );

}
add_action( 'init', 'portfolio_taxonomy', 0 );

