<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_service_box_style1 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-service-box-style1';
    }

    public function get_title() {

        return esc_html__( 'Service Box Style 1', 'appbuff' );

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
            'box_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
            'box_title',
            [
                'label' => esc_html__('Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'box_content',
            [
                'label' => esc_html__('Content', 'appbuff'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $repeater->add_control(
            'box_button',
            [
                'label' => esc_html__('Button Text', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'service_box',
            [
                'label' => esc_html__('Image box item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                        'box_button'    => esc_html__( 'Learn More', 'appbuff' ),
                    ],
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                        'box_button'    => esc_html__( 'Learn More', 'appbuff' ),
                    ],
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                        'box_button'    => esc_html__( 'Learn More', 'appbuff' ),
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
            <div class="row upset ovr-bg2 bd-hor">
                <?php foreach (  $settings['service_box'] as $service_item ) { ?>
                <div class="col-lg-4 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".2s">
                    <div class="s-block up-hor bd-hor-base">
                        <div class="nn-card-set">
                            <div class="s-card-icon"><img src="<?php echo esc_url($service_item['box_image']['url']) ?>" alt="service" class="img-fluid" /></div>
                            <h4><?php echo esc_html( $service_item['box_title'] ) ?></h4>
                            <p><?php echo esc_html( $service_item['box_content'] ) ?></p>
                            <a href="javascript:void(0)"><?php echo esc_html( $service_item['box_button'] ) ?> <i class="fas fa-chevron-right fa-icon"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}