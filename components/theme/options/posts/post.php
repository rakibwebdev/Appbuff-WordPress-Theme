<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'settings-featured-video' => array(
		'title'		 => esc_html__( 'Featured video', 'appbuff' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			'featured_video'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Video URL', 'appbuff' ),
				'desc'	 => esc_html__( 'Paste a video link from Youtube, Vimeo, Dailymotion, Facebook or Twitter it will be embedded in the post and the thumb used as the featured image of this post. 
				You need to choose "Video Format" as post format to use "Featured Video".', 'appbuff' ),
			)
		),
	),


	'settings-featured-audio' => array(
		'title'		 => esc_html__( 'Featured audio', 'appbuff' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			'featured_audio'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Audio URL', 'appbuff' ),
				'desc'	 => esc_html__( 'Paste a soundcloud link here.', 'appbuff' ),
			)
		),
	),
	
	'settings-featured-gallery' => array(
		'title'		 => esc_html__( 'Featured gallary', 'appbuff' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			'featured_gallery'	 => array(
				'type'	 => 'multi-upload',
				'images_only' => true,
				'label'	 => esc_html__( 'Featured gallery', 'appbuff' ),
				'desc'	 => esc_html__( 'Select featured gallery images for this post.', 'appbuff' ),
			)
		),
	),

);
