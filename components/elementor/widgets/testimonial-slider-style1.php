<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_testimonial_style1 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-testimonial-style1';
    }

    public function get_title() {

        return esc_html__( 'Testimonial Slider Style 1', 'appbuff' );

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
            'testimonial_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
            'testimonial_name',
            [
                'label' => esc_html__('Name', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'testimonial_designation',
            [
                'label' => esc_html__('Designation', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'testimonial_content',
            [
                'label' => esc_html__('Content', 'appbuff'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'testimonial_box',
            [
                'label' => esc_html__('Testimonial item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'testimonial_name' => esc_html__('John Doe', 'appbuff'),
                        'testimonial_designation' => esc_html__( 'Web Developer', 'appbuff' ),
                        'testimonial_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                    ],
                    [
                        'testimonial_title' => esc_html__('John Doe', 'appbuff'),
                        'testimonial_designation' => esc_html__( 'Web Developer', 'appbuff' ),
                        'testimonial_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
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
            <div class="testimonial-card-a tcd owl-carousel">
                <?php foreach (  $settings['testimonial_box'] as $testimonial_item ) { ?>
                    <div class="testimonial-card">
                        <div class="tt-text">
                            <p><?php echo esc_html( $testimonial_item['testimonial_content'] ) ?></p>
                        </div>
                        <div class="client-thumbs mt30">
                            <div class="media v-center upset">
                                <div class="user-image bdr-radius"><img src="<?php echo esc_url($testimonial_item['testimonial_image']['url']) ?>"
                                        alt="girl" class="img-fluid rounded-circle" /></div>
                                <div class="media-body user-info v-center">
                                    <h5><?php echo esc_html( $testimonial_item['testimonial_name'] ) ?></h5>
                                    <p><?php echo esc_html( $testimonial_item['testimonial_designation'] ) ?></p>
                                    <i class="fas fa-quote-right posiqut"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}