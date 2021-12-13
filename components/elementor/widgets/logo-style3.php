<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_badges extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-badges';
    }

    public function get_title() {

        return esc_html__( 'Appbuff Badges', 'appbuff' );

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

        $this->add_control(
            'image_box',
            [
                'label' => esc_html__('Image box item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'box_title' => esc_html__('ABC DEF Industry Leader', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('ABC DEF Industry Leader', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('ABC DEF Industry Leader', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('ABC DEF Industry Leader', 'appbuff'),
                    ],
                ],
                'fields' => $repeater->get_controls(),
            ]
        );
        
        
        
        
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $delay = 200;
        ?>
            <div class="row">
                <?php foreach (  $settings['image_box'] as $box_item ) { ?>
                    <div class="col-lg-3 col-md-6 col-6 wow fadeIn" data-wow-delay="<?php echo $delay ?>ms">
                        <div class="badges-content">
                            <img src="<?php echo esc_url( $box_item['box_image']['url'] ) ?>" alt="budges" class="img-fluid">
                            <p><?php echo esc_html( $box_item['box_title'] ) ?></p>
                        </div>
                    </div>
                <?php 
                $delay=$delay + 200;
                } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}