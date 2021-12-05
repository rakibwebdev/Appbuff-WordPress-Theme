<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * helper functions
 */

// simply echo the variable
// ----------------------------------------------------------------------------------------
function appbuff_return( $s ) {
	return $s;
}


// return the specific value from theme options/ customizer/ etc
// ----------------------------------------------------------------------------------------
function appbuff_option( $key, $default_value = '', $method = 'customizer' ) {
	if ( defined( 'FW' ) ) {
		switch ( $method ) {
			case 'theme-settings':
				$value = fw_get_db_settings_option( $key );
				break;
			case 'customizer':
				$value = fw_get_db_customizer_option( $key );
				break;
			default:
				$value = '';
				break;
		}
		return (!isset($value) || $value == '') ? $default_value :  $value;
	}
	return $default_value;
}


// return the specific value from metabox
// ----------------------------------------------------------------------------------------
function appbuff_meta_option( $postid, $key, $default_value = '' ) {
	if ( defined( 'FW' ) ) {
		$value = fw_get_db_post_option($postid, $key, $default_value);
	}
	return (!isset($value) || $value == '') ? $default_value :  $value;
}


// unyson based image resizer
// ----------------------------------------------------------------------------------------
function appbuff_resize( $url, $width = false, $height = false, $crop = false ) {
	if ( function_exists( 'fw_resize' ) ) {
		$fw_resize	 = FW_Resize::getInstance();
		$response	 = $fw_resize->process( $url, $width, $height, $crop );
		return (!is_wp_error( $response ) && !empty( $response[ 'src' ] ) ) ? $response[ 'src' ] : $url;
	} else {
		$response = wp_get_attachment_image_src( $url, array( $width, $height ) );
		if ( !empty( $response ) ) {
			return $response[ 0 ];
		}
	}
}


// extract unyson image data from option value in a much simple way
// ----------------------------------------------------------------------------------------
function appbuff_src( $key, $default_value = '', $input_as_attachment = false ) { // for src
	if ( $input_as_attachment == true ) {
		$attachment = $key;
	} else {
		$attachment = appbuff_option( $key );
	}

	if ( isset( $attachment[ 'url' ] ) && !empty( $attachment ) ) {
		return $attachment[ 'url' ];
	}

	return $default_value;
}


// return attachment alt in safe mode
// ----------------------------------------------------------------------------------------
function appbuff_alt( $id ) {
	if ( !empty( $id ) ) {
		$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
		if ( !empty( $alt ) ) {
			$alt = $alt;
		} else {
			$alt = get_the_title( $id );
		}
		return $alt;
	}
}


// get original id in WPML enabled WP
// ----------------------------------------------------------------------------------------
function appbuff_org_id( $id, $name = true ) {
	if ( function_exists( 'icl_object_id' ) ) {
		$id = icl_object_id( $id, 'page', true, 'en' );
	}

	if ( $name === true ) {
		$post = get_post( $id );
		return $post->post_name;
	} else {
		return $id;
	}
}


// converts rgb color code to hex format
// ----------------------------------------------------------------------------------------
function appbuff_rgb2hex( $hex ) {
	$hex		 = preg_replace( "/^#(.*)$/", "$1", $hex );
	$rgb		 = array();
	$rgb[ 'r' ]	 = hexdec( substr( $hex, 0, 2 ) );
	$rgb[ 'g' ]	 = hexdec( substr( $hex, 2, 2 ) );
	$rgb[ 'b' ]	 = hexdec( substr( $hex, 4, 2 ) );

	$color_hex = $rgb[ "r" ] . ", " . $rgb[ "g" ] . ", " . $rgb[ "b" ];
	return $color_hex;
}


// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function appbuff_kses( $raw ) {

	$allowed_tags = array(
		'a'								 => array(
			'class'	 => array(),
			'href'	 => array(),
			'rel'	 => array(),
			'title'	 => array(),
		),
		'abbr'							 => array(
			'title' => array(),
		),
		'b'								 => array(),
		'blockquote'					 => array(
			'cite' => array(),
		),
		'cite'							 => array(
			'title' => array(),
		),
		'code'							 => array(),
		'del'							 => array(
			'datetime'	 => array(),
			'title'		 => array(),
		),
		'dd'							 => array(),
		'div'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'dl'							 => array(),
		'dt'							 => array(),
		'em'							 => array(),
		'h1'							 => array(),
		'h2'							 => array(),
		'h3'							 => array(),
		'h4'							 => array(),
		'h5'							 => array(),
		'h6'							 => array(),
		'i'								 => array(
			'class' => array(),
		),
		'img'							 => array(
			'alt'	 => array(),
			'class'	 => array(),
			'height' => array(),
			'src'	 => array(),
			'width'	 => array(),
		),
		'li'							 => array(
			'class' => array(),
		),
		'ol'							 => array(
			'class' => array(),
		),
		'p'								 => array(
			'class' => array(),
		),
		'q'								 => array(
			'cite'	 => array(),
			'title'	 => array(),
		),
		'span'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'iframe'						 => array(
			'width'			 => array(),
			'height'		 => array(),
			'scrolling'		 => array(),
			'frameborder'	 => array(),
			'allow'			 => array(),
			'src'			 => array(),
		),
		'strike'						 => array(),
		'br'							 => array(),
		'strong'						 => array(),
		'data-wow-duration'				 => array(),
		'data-wow-delay'				 => array(),
		'data-wallpaper-options'		 => array(),
		'data-stellar-background-ratio'	 => array(),
		'ul'							 => array(
			'class' => array(),
		),
	);

	if ( function_exists( 'wp_kses' ) ) { // WP is here
		$allowed = wp_kses( $raw, $allowed_tags );
	} else {
		$allowed = $raw;
	}


	return $allowed;
}


// build google font url
// ----------------------------------------------------------------------------------------
// function appbuff_google_fonts_url() {
// 	$fonts_url		 = '';
// 	$font_families	 = array();
// 	//Body Font
// 	$body_font		 = appbuff_option( 'body_font' );
// 	if ( !empty( $body_font ) ) {
// 		$body_families	 = isset( $body_font[ 'font-family' ] ) ? $body_font[ 'font-family' ] : '';
// 		$body_variant	 = isset( $body_font[ 'variant' ] ) ? $body_font[ 'variant' ] : '';
// 		$font_families[] = $body_families . ":" . $body_variant;
// 	}
// 	//Heading font
// 	if ( !empty( $head_font ) ) {
// 		$head_font		 = appbuff_option( 'heading_font' );
// 		$head_families	 = isset( $head_font[ 'font-family' ] ) ? $head_font[ 'font-family' ] : '';
// 		$head_variant	 = isset( $head_font[ 'variant' ] ) ? $head_font[ 'variant' ] : '';
// 		$font_families[] = $head_families . ":" . $head_variant;
// 	}

// 	$font_families[] = 'Karla:400,700|Rubik:300,400,500,700';
	

// 	if ( $font_families ) {
// 		$query_args = array(
// 			'family' => urlencode( implode( '|', $font_families ) )
// 		);

// 		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
// 	}

// 	return esc_url_raw( $fonts_url );
// }


// return megamenu child item's slug
// ----------------------------------------------------------------------------------------
function appbuff_get_mega_item_child_slug( $location, $option_id ) {
	$mega_item	 = '';
	$locations	 = get_nav_menu_locations();
	$menu		 = wp_get_nav_menu_object( $locations[ $location ] );
	$menuitems	 = wp_get_nav_menu_items( $menu->term_id );

	foreach ( $menuitems as $menuitem ) {

		$id			 = $menuitem->ID;
		$mega_item	 = fw_ext_mega_menu_get_db_item_option( $id, $option_id );
	}
	return $mega_item;
}


// return cover image from an youtube video url
// ----------------------------------------------------------------------------------------
function appbuff_youtube_cover( $e ) {
	$src = null;
	//get the url
	if ( $e != '' ){
		$url = $e;
		$queryString = parse_url( $url, PHP_URL_QUERY );
		parse_str( $queryString, $params );
		$v = $params[ 'v' ];
		//generate the src
		if ( strlen( $v ) > 0 ) {
			$src = "http://i3.ytimg.com/vi/$v/default.jpg";
		}
	}

	return $src;
}


// return embed code for sound cloud
// ----------------------------------------------------------------------------------------
function appbuff_soundcloud_embed( $url ) {
	return 'https://w.soundcloud.com/player/?url=' . urlencode($url) . '&auto_play=false&color=915f33&theme_color=00FF00';
}


// return embed code video url
// ----------------------------------------------------------------------------------------
function appbuff_video_embed($url){
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
	$embed_url = '';
    if(strpos($url, 'facebook.com/') !== false) {
        //it is FB video
        $embed_url ='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
    }else if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $video_id = explode("vimeo.com/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://player.vimeo.com/video/'.$video_id;
    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $video_id = explode("v=",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
		$embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $video_id = explode("youtu.be/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else{
        //for new valid video URL
    }
    return $embed_url;
}
