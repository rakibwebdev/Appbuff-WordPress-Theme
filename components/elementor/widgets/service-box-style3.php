<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_service_box_style3 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-service-box-style3';
    }

    public function get_title() {

        return esc_html__( 'Service Box Style 3', 'appbuff' );

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
                'label' => esc_html__('Service box style', 'appbuff'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
			'categories',
			[
				'label' => esc_html__( 'Categories', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'iphone'  => esc_html__( 'Iphone', 'appbuff' ),
					'android' => esc_html__( 'Android', 'appbuff' ),
					'crossplatform' => esc_html__( 'Cross Platform', 'appbuff' ),
                    'ui' => esc_html__( 'UI/UX', 'appbuff' ),
                    'php' => esc_html__( 'PHP', 'appbuff' ),
                    'laravel' => esc_html__( 'Laravel', 'appbuff' ),
                    'wordpress' => esc_html__( 'Wordpress', 'appbuff' ),
                    'shopify' => esc_html__( 'Shopify', 'appbuff' ),
                    'woocommerce' => esc_html__( 'Woocommerce', 'appbuff' ),
				],
				'default' => [ 'iphone', 'android', 'crossplatform' ],
			]
		);
        $repeater->add_control(
            'box_image',
            [
                'label' => esc_html__('Image', 'appbuff'),
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
        $repeater->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'service_box',
            [
                'label' => esc_html__('Service item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'box_title' => esc_html__('App Development', 'appbuff'),
                        'box_content' => esc_html__('Design and develop a creative website with our microscopic detailing and
                        scrupulous strategies.', 'appbuff'),
                        'box_button'    => esc_html__( 'Read More', 'appbuff' ),
                        'button_url'    => esc_html__( '#', 'appbuff')
                    ],
                    [
                        'box_title' => esc_html__('App Development', 'appbuff'),
                        'box_content' => esc_html__('Design and develop a creative website with our microscopic detailing and
                        scrupulous strategies.', 'appbuff'),
                        'box_button'    => esc_html__( 'Read More', 'appbuff' ),
                        'button_url'    => esc_html__( '#', 'appbuff')
                    ],
                    [
                        'box_title' => esc_html__('App Development', 'appbuff'),
                        'box_content' => esc_html__('Design and develop a creative website with our microscopic detailing and
                        scrupulous strategies.', 'appbuff'),
                        'box_button'    => esc_html__( 'Read More', 'appbuff' ),
                        'button_url'    => esc_html__( '#', 'appbuff')
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
                <?php foreach (  $settings['service_box'] as $service_item ) { ?>
                    <div class="col-lg-4 col-md-6 mt30 wow fadeIn" data-wow-delay="0.2s">
                        <div class="service-card-app hoshd">
                            <h4><?php echo $service_item['box_title'] ?></h4>
                            <ul class="-service-list mt10">
                                <?php foreach (  $service_item['categories'] as $cat_item ) { ?>
                                <li> <a href="#"><?php echo $cat_item ?> </a> </li>
                                <?php } ?>
                            </ul>
                            <div class="tec-icon mt30">
                                <ul class="servc-icon-sldr">
                                    <li><a href="#">
                                            <div class="img-iconbb"><img src="<?php echo $service_item['box_image']['url']  ?>" alt="img"></div>
                                        </a></li>
                                    
                                </ul>
                            </div>
                            <p class="mt20"><?php echo $service_item['box_content'] ?></p>
                            <a href="<?php echo $service_item['button_url'] ?>" class="mt20 link-prbs"><?php echo $service_item['box_button'] ?> <i
                                    class="fas fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}