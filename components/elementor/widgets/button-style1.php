<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_button_style1 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-button';
    }

    public function get_title() {

        return esc_html__( 'Appbuff Button Style 1', 'appbuff' );

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
                'label' => esc_html__('Link Text', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get A Quotation',
            ]
        );
        $this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);
        
        
        
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $text = $settings['action_url_text'];
        $link = $settings['action_url']['url'];

        ?>
        <div class="content-sec  d-flex mt30 v-center text-w wow fadeIn" data-wow-delay="0.6s">
            <div class="mr25"><a href="<?php echo $link ?>" class="btn-main bg-btn4 lnk"><?php echo $text ?><i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a></div>
        </div>
        <?php

    }
    protected function content_template() { }
}