<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: page
 */
class Page{
    public static function options(){
        return [
            'title'		 => esc_html__( 'Page settings', 'appbuff' ),
            'options'	 => [
                'page_breadcrumb' => [
                    'type'			 => 'switch',
                    'label'			 => esc_html__( 'Page breadcrumb', 'appbuff' ),
                    'desc'			 => esc_html__( 'Do you want to show breadcrumb in all pages ?', 'appbuff' ),
                    'value'          => 'yes',
                    'left-choice'	 => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__( 'Yes', 'appbuff' ),
                    ],
                    'right-choice'	 => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'appbuff' ),
                    ],
                ],
            ],
        ];
    }
}