<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_image_box_style4 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-image-box-style4';
    }

    public function get_title() {

        return esc_html__( 'Image Box Style 4', 'appbuff' );

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
                'label' => esc_html__('Image box style', 'appbuff'),
            ]
        );
        $this->add_control(
            'box_image',
			[
				'label' => __( 'Choose Image', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        $this->add_control(
            'box_title',
            [
                'label' => esc_html__('Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'box_content',
            [
                'label' => esc_html__('Content', 'appbuff'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
 
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();

        ?>
            <div class="s-block">
            <div class="s-card-icon"><img src="<?php echo $settings['box_image']['url'] ?>" alt="service" class="img-fluid"></div>
            <h4><?php echo $settings['box_title'] ?></h4>
            <p><?php echo $settings['box_content'] ?></p>
            </div>
        <?php
    }
    protected function content_template() { }
}