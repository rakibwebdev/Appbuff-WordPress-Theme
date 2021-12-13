<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_client_logoset extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-client-logoset';
    }

    public function get_title() {

        return esc_html__( 'Appbuff Client Logo set', 'appbuff' );

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
                'label' => esc_html__('Client Logo Set', 'appbuff'),
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
                        'box_title' => esc_html__('Shutter, USA', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Shutter, USA', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Shutter, USA', 'appbuff'),
                    ],
                    [
                        'box_title' => esc_html__('Shutter, USA', 'appbuff'),
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
            <div class="client-logoset">
				<ul class="row text-center clearfix apppg">
                <?php foreach (  $settings['image_box'] as $box_item ) { ?>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-6 mt30 wow fadeIn" data-wow-delay="<?php echo $delay ?>ms">
                        <div class="brand-logo hoshd"><img src="<?php echo esc_url( $box_item['box_image']['url'] ) ?>" alt="clients"
                                class="img-fluid"></div>
                        <p><?php echo esc_html( $box_item['box_title'] ) ?></p>
                    </li>
                <?php 
                $delay=$delay + 200;
                } ?>
                </ul>
            </div>
        <?php

    }
    protected function content_template() { }
}