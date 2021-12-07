<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * includes all files and trigger the action hook by load
 */

class Appbuff_Theme_Includes {

	private static $rel_path	 = null;
	private static $initialized	 = false;
	private static $customizer	 = [];


    // auto load
    // ----------------------------------------------------------------------------------------
	public static function init() {
		if ( self::$initialized ) {
			return;
		} else {
			self::$initialized = true;
		}

        self::_action_init();
        add_action( 'widgets_init', array( __CLASS__, '_action_widgets_init' ) );

		if(!is_admin()){
            // for frontend
			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_action_enqueue_scripts' ), 20	);
		}else{
			// for admin
			add_action( 'admin_enqueue_scripts', array( __CLASS__, '_action_enqueue_admin_scripts' ), 20 );
		}

		add_action('fw_option_types_init', array( __CLASS__, '_action_custom_option_types'));
	}


    // directory name to class name, transform dynamically
    // ----------------------------------------------------------------------------------------
	private static function dirname_to_classname( $dirname ) {
		$class_name	 = explode( '-', $dirname );
		$class_name	 = array_map( 'ucfirst', $class_name );
		$class_name	 = implode( '_', $class_name );

		return $class_name;
    }
    

    // directory path for theme core
    // ----------------------------------------------------------------------------------------
	private static function get_rel_path( $append = '' ) {
		self::$rel_path = '/core';
		return self::$rel_path . $append;
	}


    // directory path for theme components
    // ----------------------------------------------------------------------------------------
	private static function get_com_path( $append = '' ) {
		self::$rel_path = '/components';
		return self::$rel_path . $append;
	}

    // directory path for theme core, if child theme activated
    // ----------------------------------------------------------------------------------------
	public static function get_parent_path( $rel_path, $frag = 'rel' ) {
		$class_name = 'get_' . $frag . '_path';
		return get_template_directory() . self::$class_name( $rel_path );
    }

    // child theme path
    // ----------------------------------------------------------------------------------------
	public static function get_child_path( $rel_path, $frag = 'rel' ) {
		if ( !is_child_theme() ) {
			return null;
		}
		$class_name = 'get_' . $frag . '_path';
		return get_stylesheet_directory() . self::$class_name( $rel_path );
	}


    // include method
    // ----------------------------------------------------------------------------------------
	public static function include_isolated( $path ) {
        include $path;
	}


    // include and register widgets
    // ----------------------------------------------------------------------------------------
	public static function include_widget( $widget_dir ) {
        $rel_path = '/widgets';
		if ( is_child_theme() ) {
			$path = self::get_child_path( $rel_path, 'com' ) . '/' . $widget_dir;
			if ( file_exists( $path ) ) {
				self::include_isolated( $path . '/widget-class.php' );
			}
		}else{
			$path = self::get_parent_path( $rel_path, 'com' ) . '/' . $widget_dir;
			if ( file_exists( $path ) ) {
				self::include_isolated( $path . '/widget-class.php' );
			}
        }
		register_widget( 'Appbuff_' . self::dirname_to_classname( $widget_dir ) );
	}


    // include and extract customizer options
    // ----------------------------------------------------------------------------------------
	public static function include_customizer_options( $option_file ) {
        $rel_path = '/theme/options/customizer' . '/options-'.$option_file.'.php';
		if ( is_child_theme() ) {
			$path = self::get_child_path( $rel_path, 'com' );
			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}else{
			$path = self::get_parent_path( $rel_path, 'com' );
			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
        }
		$klass = self::dirname_to_classname( str_replace(['options-', '.php'], '', $option_file) );
		self::$customizer[$option_file . '_settings'] = $klass::options();
	}


    // include method, child theme is main priority 
    // ----------------------------------------------------------------------------------------
	public static function include_child_first( $rel_path, $frag = 'rel' ) {
		if ( is_child_theme() ) {
			$path = self::get_child_path( $rel_path, $frag );
			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}else{
			$path = self::get_parent_path( $rel_path, $frag );			
			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}
	}

    /******************************************************************************************
    ** starts include section
    ** add all files bellow, they will be included by load.
    ** all include files should be mentioned here.
    ** DO NOT use include() function anywhere else except init.php nd the theme functions.php
    ******************************************************************************************/

    // include all necessary files for hooks
    // ----------------------------------------------------------------------------------------
	public static function _action_init() {
 		
        // helper files:functions
        self::include_child_first( '/helpers/functions/global.php' );
		self::include_child_first( '/helpers/functions/template.php' );
		
        // helper files:classes
        self::include_child_first( '/helpers/classes/global.php' );

		// lib files
		self::include_child_first( '/libs/class-tgm-plugin-activation.php' );
		
        // setup related files
        self::include_child_first( '/installation-fragments/tgmpa-plugins.php' );
		self::include_child_first( '/installation-fragments/theme-demos.php' );
		
        // menu
        self::include_child_first( '/hooks/menus.php' );

        // blog related all hooks
        self::include_child_first( '/hooks/blog.php' );
        
        // custom font
        self::include_child_first( '/hooks/custom-fonts.php' );
        
        // gogole font
        self::include_child_first( '/hooks/unyson-google-fonts.php' );
        
        // register widget areas
		self::include_child_first( '/hooks/widget-areas.php' );

    }
    

    // add all enqueue files here, for frontend
    // ----------------------------------------------------------------------------------------
	public static function _action_enqueue_scripts() {
		self::include_child_first( '/enqueues/frontend/static.php' );
		self::include_child_first( '/enqueues/frontend/dynamic.php' );
	}


    // add all enqueue files here, for admin
    // ----------------------------------------------------------------------------------------
	public static function _action_enqueue_admin_scripts() {
		self::include_child_first( '/enqueues/admin/static.php' );
	}

    
    // include widgets
    // ----------------------------------------------------------------------------------------
	public static function _action_widgets_init() {
        // self::include_widget('recent-post');
        // self::include_widget('footer-address');
	}

	
    // include customizer options
    // ----------------------------------------------------------------------------------------
	public static function _customizer_init() {
		// self::include_customizer_options('blog');
		// self::include_customizer_options('page');
		self::include_customizer_options('header');
		

		// returns the joined array, DO NOT add or edit anything bellow
		return self::$customizer;
	}


	// custom option types for unyson
    // ----------------------------------------------------------------------------------------
	public static function _action_custom_option_types() {
		if (is_admin()) {
			$dir = '/option-types';
			self::include_child_first( $dir . '/option-types/new-icon/class-fw-option-type-new-icon.php', 'com');
			self::include_child_first( $dir . '/option-types/fw-multi-inline/class-fw-option-type-fw-multi-inline.php', 'com');
			// and all other option types
		}
	}

}

Appbuff_Theme_Includes::init();