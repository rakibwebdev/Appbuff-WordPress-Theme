<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function _action_appbuff_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'appbuff'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'appbuff'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }
}

add_action('widgets_init', '_action_appbuff_widget_init');