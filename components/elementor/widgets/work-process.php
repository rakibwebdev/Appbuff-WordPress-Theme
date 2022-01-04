<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Work_Process extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-work-process';
    }

    public function get_title() {

        return esc_html__( 'Work Process', 'appbuff' );

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
                'label' => esc_html__('Work Process Content', 'appbuff'),
            ]
        );
        $this->add_control(
            'counter',
            [
                'label' => esc_html__('Counter', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'content',
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
        <div class="ps-block">
            <span><?php echo $settings['counter'] ?></span>
            <h3><?php echo $settings['title'] ?></h3>
            <p><?php echo $settings['content'] ?></p>
          </div>
        <?php
    }
    protected function content_template() { }
}