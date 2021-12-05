<?php

/**
* Theme function file
**/


// shorthand contants
// ------------------------------------------------------------------------
define('APPBUFFF_THEME', 'Appbuff Theme');
define('APPBUFFF_VERSION', time());
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
define('APPBUFFF_INSTALLATION', APPBUFFF_CORE . '/installation-fragments');
define('APPBUFFF_REMOTE_CONTENT', esc_url('http://xpeedstudio.net/demo-content/appbuff'));


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
