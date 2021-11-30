<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: appbuff_section_{section name}
 */

$options = [
	'appbuff_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'appbuff' ),
		'options'			 => Xsprefix_Theme_Includes::_customizer_init(),
		'wp-customizer-args' => [
			'priority' => 3,
		],
	],
];
