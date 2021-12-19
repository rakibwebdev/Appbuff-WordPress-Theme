<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Office_Location extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-image-box-style3';
    }

    public function get_title() {

        return esc_html__( 'Office Location Box', 'appbuff' );

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
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
            'country',
            [
                'label' => esc_html__('Country', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'office_name',
            [
                'label' => esc_html__('Office Name', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'address',
            [
                'label' => esc_html__('Full Address', 'appbuff'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'email',
            [
                'label' => esc_html__('Email', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'phone',
            [
                'label' => esc_html__('Phone', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();

        ?>
            <div class="justify-content-center">
                <div class="shape-loc wow fadeIn">
                    <div class="office-card hoshd">
                        <div class="landscp">
                            <img src="<?php echo $settings['image']['url'] ?>" alt="location" class="img-fluid" />
                        </div>
                        <div class="info-text-div">
                            <h4><?php echo $settings['country'] ?></h4>
                            <h6 class="mt10"><?php echo $settings['office_name'] ?></h6>
                            <p><?php echo $settings['address'] ?></p>
                            <ul class="-address-list mt10">
                                <li><a href="mailto:<?php echo $settings['email'] ?>"><i class="fas fa-envelope"></i> <?php echo $settings['email'] ?></a></li>
                                <li><a href="https://wa.me/<?php echo $settings['phone'] ?>"><i class="fas fa-phone-alt"></i> <?php echo $settings['phone'] ?></a> </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    protected function content_template() { }
}