<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Header_Cta extends Widget_Base {

    public function get_name() {
        return 'header-cta';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Header CTA', 'appbuff' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return [ 'appbuff-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Appbuff Header CTA', 'appbuff'),
            ]
        );

        $this->add_control(
            'hr_image',
            [
                'label' => esc_html__('HR Image', 'appbuff'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'hr_text',
            [
                'label' => esc_html__('HR Number', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Client Area', 'appbuff' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('Button URL', 'appbuff'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'      =>[
                    'url'   => '#',
                ]
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'cta_image',
            [
                'label' => esc_html__('Image', 'appbuff'),
                'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Link', 'appbuff'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'cta',
            [
                'label' => esc_html__('Sales Department', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'text' => esc_html__('01957602444', 'appbuff'),
                    ],

                    [
                        'text' => esc_html__('01957602444', 'appbuff'),

                    ],

                    [
                        'text' => esc_html__('01957602444', 'appbuff'),

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
        <div class="custom-nav">
            <ul class="nav-list nav-right-btn">
                <li class="contact-show">
                    <a href="#" class="btn-round- trngl btn-br bg-btn"><i class="fas fa-phone-alt"></i></a>
                    <div class="contact-inquiry">
                        <div class="contact-info-">
                        <div class="contct-heading">Avilable on WhatsApp</div>
                        <div class="inquiry-card-nn hrbg">
                        <div class="title-inq-c">FOR HR DEPARTMENT</div>
                            <ul>
                                <li class="mb0"><img src="<?php echo $settings['hr_image']['url'] ?>" alt="us office" class="flags-size"> <a href="https://wa.me/<?php echo $settings['hr_text'] ?>" ><?php echo $settings['hr_text'] ?></a></li>
                            </ul>
                        </div>
                        <div class="inquiry-card-nn">
                            <div class="title-inq-c">FOR SALES DEPARTMENT</div>
                                <ul>
                                <?php 
                                foreach (  $settings['cta'] as $cta_item ) { ?>
                                    <li><a href="https://wa.me/<?php echo $cta_item['text'] ?>"><img src="<?php echo $cta_item['cta_image']['url'] ?>" alt="Bangladesh office" class="flags-size"><?php echo $cta_item['text'] ?></a></li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="<?php echo $settings['btn_url']['url']; ?>" class="btn-br bg-btn3 btshad-b2 lnk"><?php echo $settings['btn_text']; ?><span class="circle"></span></a> </li>
            </ul>
        </div>

    <?php
    }
    protected function content_template() { }
}