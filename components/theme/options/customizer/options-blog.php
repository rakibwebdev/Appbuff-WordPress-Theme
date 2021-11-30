<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */
class Blog{
    public static function options(){
        return [
            'title'		 => esc_html__( 'Blog settings', 'appbuff' ),
            'options'	 => [
                'blog_title' => [
                    'label'	 => esc_html__( 'Global blog title', 'appbuff' ),
                    'type'	 => 'text',
                ],
                'blog_header_image' => [
                    'label'	 => esc_html__( 'Global header background image', 'appbuff' ),
                    'type'	 => 'upload',
                 ],
                'blog_breadcrumb' => [
                    'type'			 => 'switch',
                    'label'			 => esc_html__( 'Breadcrumb', 'appbuff' ),
                    'desc'			 => esc_html__( 'Do you want to show breadcrumb?', 'appbuff' ),
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
                'blog_author' => [
                    'type'			 => 'switch',
                    'label'			 => esc_html__( 'Blog author', 'appbuff' ),
                    'desc'			 => esc_html__( 'Do you want to show blog author?', 'appbuff' ),
                    'value'          => 'yes',
                    'left-choice' => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__( 'Yes', 'appbuff' ),
                    ],
                    'right-choice' => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'appbuff' ),
                    ],
               ],
                'blog_social_share' => [
                    'type'			 => 'switch',
                    'label'			 => esc_html__( 'Social share', 'appbuff' ),
                    'desc'			 => esc_html__( 'Do you want to show social share buttons?', 'appbuff' ),
                    'value'          => 'yes',
                    'left-choice' => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__( 'Yes', 'appbuff' ),
                    ],
                    'right-choice' => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'appbuff' ),
                    ],
               ],
            ],
        ];
    }
}