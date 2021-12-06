<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_image_box_style1 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-image-box-style1';
    }

    public function get_title() {

        return esc_html__( 'Image Box Style 1', 'appbuff' );

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
        $repeater = new Repeater();
        $repeater->add_control(
            'counter_number',
            [
                'label' => esc_html__('Counter Number', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'counter_text',
            [
                'label' => esc_html__('Counter text', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'counter',
            [
                'label' => esc_html__('Slider', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'counter_number' => esc_html__('200', 'appbuff'),
                        'counter_text' => esc_html__('Happy Clients', 'appbuff'),
                    ],
                    [
                        'counter_number' => esc_html__('200', 'appbuff'),
                        'counter_text' => esc_html__('Happy Clients', 'appbuff'),
                    ],
                    [
                        'counter_number' => esc_html__('200', 'appbuff'),
                        'counter_text' => esc_html__('Happy Clients', 'appbuff'),
                    ],
                ],
                'fields' => $repeater->get_controls(),
            ]
        );
        
        
        
        
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();

        ?>
            <div class="row upset">
                <div class="col-lg-3 col-sm-6 mt30">
                <div class="s-block up-hor">
                    <div class="s-card-icon"><img src="images/icons/research.svg" alt="service" class="img-fluid"/></div>
                    <h4>Reasearch and Analysis</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt30">
                <div class="s-block up-hor">
                    <div class="s-card-icon"><img src="images/icons/chat.svg" alt="service" class="img-fluid"/></div>
                    <h4>Negotiation and power</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt30">
                <div class="s-block up-hor">
                    <div class="s-card-icon"><img src="images/icons/monitor.svg" alt="service" class="img-fluid"/></div>
                    <h4>Creative and innovative solutions</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt30">
                <div class="s-block up-hor">
                    <div class="s-card-icon"><img src="images/icons/trasparency.svg" alt="service" class="img-fluid"/></div>
                    <h4>Trasparency and ease of work</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                </div>
            </div>
          </div>
        <?php

    }
    protected function content_template() { }
}