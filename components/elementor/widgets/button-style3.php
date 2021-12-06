<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_button_style3 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-button-style3';
    }

    public function get_title() {

        return esc_html__( 'Appbuff Button Style 3', 'appbuff' );

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
                'label' => esc_html__('Title settings', 'appbuff'),
            ]
        );

        $this->add_control(
            'action_url',
            [
                'label' => esc_html__('Link', 'appbuff'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->add_control(
            'action_url_text',
            [
                'label' => esc_html__('View Opening', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get A Quotation',
            ]
        );
        
        
        
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $text = $settings['action_url_text'];
        $link = $settings['action_url']['url'];
        ?>
        <a href="<?php echo esc_html($link) ?>" class="btn-main bg-btn2 lnk mt30"> <?php echo esc_html( $text ) ?><i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
        <?php

    }
    protected function content_template() { }
}