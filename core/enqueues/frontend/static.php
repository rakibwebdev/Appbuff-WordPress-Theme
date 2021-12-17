<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

	// 3rd party css
	wp_enqueue_style('appbuff-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap', null, APPBUFFF_VERSION );
	wp_enqueue_style( 'bootstrap', APPBUFFF_CSS . '/bootstrap.min.css', null, APPBUFFF_VERSION );
	wp_enqueue_style( 'font-awesome1', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', null, APPBUFFF_VERSION );
	wp_enqueue_style( 'plugin-style', APPBUFFF_CSS . '/plugin.min.css', null, APPBUFFF_VERSION );
	wp_enqueue_style( 'responsive-style', APPBUFFF_CSS . '/responsive.css', null, APPBUFFF_VERSION );
	// theme css
	wp_enqueue_style( 'master-style', APPBUFFF_CSS . '/style.css', null, APPBUFFF_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	wp_enqueue_script( 'modernizr-3.5.0', APPBUFFF_JS . '/vendor/modernizr-2.8.3.min.js', array( 'jquery' ), APPBUFFF_VERSION, false );

	// 3rd party scripts
	wp_enqueue_script( 'bootstrap', APPBUFFF_JS . '/bootstrap.bundle.min.js', array( 'jquery' ), APPBUFFF_VERSION, true );
	//wp_enqueue_script( 'appbuff-form', APPBUFFF_JS . '/form.js', array( 'jquery' ), APPBUFFF_VERSION, true );
	//wp_enqueue_script( 'appbuff-cookie', APPBUFFF_JS . '/jquery.ihavecookies.js', array( 'jquery' ), APPBUFFF_VERSION, true );
	//wp_enqueue_script( 'owl-carousel', APPBUFFF_JS . '/form.js', array( 'jquery' ), APPBUFFF_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'appbuff-plugins', APPBUFFF_JS . '/plugin.min.js', array( 'jquery' ), APPBUFFF_VERSION, true );
	wp_enqueue_script( 'appbuff-script', APPBUFFF_JS . '/main.js', array( 'jquery' ), APPBUFFF_VERSION, true );
	
	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}