<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_fun_fact extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-fun-fact';
    }

    public function get_title() {

        return esc_html__( 'Appbuff fun fact', 'appbuff' );

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
                'label' => esc_html__('Fun Fact', 'appbuff'),
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
        <div class="row in-stats about-statistics">
        <?php foreach (  $settings['counter'] as $counter ) {?>
            <div class="col-lg-4 col-sm-4">
              <div class="statistics">
                <div class="statnumb counter-number">
                  <span class="counter"><?php echo esc_html($counter['counter_number']) ?></span><span>+</span>
                  <p><?php echo esc_html( $counter['counter_text'] ) ?></p>
                </div>
              </div>
            </div>
        <?php } ?>
          </div>
        <?php

    }
    protected function content_template() { }
}