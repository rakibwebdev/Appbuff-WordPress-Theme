<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Appbuff_icon_list_style2 extends Widget_Base {


  public $base;

    public function get_name() {
        return 'appbuff-icon-list-style2';
    }

    public function get_title() {

        return esc_html__( 'Icon List Style 2', 'appbuff' );

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
                'label' => esc_html__('Icon List', 'appbuff'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'icon',
			[
				'label' => __( 'Choose Image', 'appbuff' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'class',
            [
                'label' => esc_html__('Class', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'icon_box',
            [
                'label' => esc_html__('Icon box item', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'title' => esc_html__('Phone', 'appbuff'),
                        'content' => esc_html__('Assistance hours: Sunday – Thursday, 10 am to 6 pm', 'appbuff'),
                        'subtitle' => esc_html__('+880 1712 027 879', 'appbuff'),
                        'class' => esc_html__('contact-card', 'appbuff'),
                    ],
                    [
                        'title' => esc_html__('Email', 'appbuff'),
                        'content' => esc_html__('Our support team will get back to in 24-h during standard business hours.', 'appbuff'),
                        'subtitle' => esc_html__('info@appbuff.io', 'appbuff'),
                        'class' => esc_html__('email-card', 'appbuff'),
                    ],
                    [
                        'title' => esc_html__('Skype', 'appbuff'),
                        'content' => esc_html__('We Are Online: Sunday – Thursday, 10 am to 6 pm', 'appbuff'),
                        'subtitle' => esc_html__('adaptcoder', 'appbuff'),
                        'class' => esc_html__('skype-card', 'appbuff'),
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
            <div class="contact-details">
                <?php foreach (  $settings['icon_box'] as $box_item ) { ?>
                <div class="<?php echo $box_item['class'] ?> wow fadeIn mt30" data-wow-delay="<?php echo $delay; ?>ms" style="visibility: visible; animation-delay: <?php echo $delay; ?>ms; animation-name: fadeIn;">
                    <div class="info-card v-center">
                        <span><i class="<?php echo $box_item['icon'] ?>"></i> <?php echo esc_html( $box_item['title'] ) ?>:</span>
                        <div class="info-body">
                            <p><?php echo esc_html( $box_item['content'] ) ?></p>
                            <a href="https://wa.me/<?php echo esc_html( $box_item['subtitle'] ) ?>"><?php echo esc_html( $box_item['subtitle'] ) ?></a>
                        </div>
                    </div>
                </div>
                <?php 
                $delay = $delay + 300;
                } ?>
            </div>
        <?php

    }
    protected function content_template() { }
}