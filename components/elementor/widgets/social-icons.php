<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_social_icons extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-social-icons';
    }

    public function get_title() {

        return esc_html__( 'Appbuff Social Icons', 'appbuff' );

    }

    public function get_icon() { 
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'appbuff-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Badges', 'appbuff'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'icons',
			[
				'label' => __( 'Choose Icon', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
        );
        $repeater->add_control(
            'url',
			[
				'label' => __( 'URL', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'fa fa-facebook',
			]
        );

        $this->add_control(
            'social_icons',
            [
                'label' => esc_html__('Icons', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'fields' => $repeater->get_controls(),
                'default' => [
                    'url'   => '#',
                ]
            ]
        );
        
        
        
        
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        ?>
            <div class="footer-social-media-icons">
                <?php foreach (  $settings['social_icons'] as $icon_item ) { ?>
                    <a href="<?php echo esc_url( $icon_item['url'] ) ?>" target="blank"><i
                            class="<?php echo $icon_item['icons']; ?>"></i></a>
                <?php 
                } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}