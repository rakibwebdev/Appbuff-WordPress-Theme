<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_image_box_style2 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-image-box-style2';
    }

    public function get_title() {

        return esc_html__( 'Image Box Style 2', 'appbuff' );

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
				'label' => __( 'Choose Image', 'appbuff' ),
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

        $this->add_control(
            'image_box',
            [
                'label' => esc_html__('Image box item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Reasearch and Analysis', 'appbuff'),
                        'box_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'appbuff'),
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
            <div class="itm-media-object mt40 tilt-3d">
                <?php foreach (  $settings['image_box'] as $box_item ) { ?>
                    <div class="media">
                        <div class="img-ab- base" data-tilt data-tilt-max="20" data-tilt-speed="1000"><img src="<?php echo esc_url( $box_item['box_image']['url'] ) ?>" alt="icon" class="layer"></div>
                        <div class="media-body">
                            <h4><?php echo esc_html( $box_item['box_title'] ) ?></h4>
                            <p><?php echo esc_html( $box_item['box_content'] ) ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}