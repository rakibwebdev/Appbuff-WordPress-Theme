<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */
class Header{
    public static function options(){
        return [
            'header'		 => esc_html__( 'Header settings', 'appbuff' ),
            'options'	 => [
                'logo' => [
                    'label'	 => esc_html__( 'Menu logo', 'appbuff' ),
                    'type'	 => 'upload',
                    'image_only' => true,
                 ],
                 'hr_img' => [
                    'label'	 => esc_html__( 'HR Image', 'appbuff' ),
                    'type'	 => 'upload',
                    'image_only' => true,
                 ],
                 'hr_number' => [
                    'label'	 => esc_html__( 'HR Number', 'appbuff' ),
                    'type'	 => 'text',
                ],
            ],
        ];
    }
}