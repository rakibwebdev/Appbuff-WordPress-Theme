<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Logo_Carousel_Style1 extends Widget_Base {

    public function get_name() {
        return 'logo-carousel-stye1';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Logo Carousel Style 1', 'appbuff' );
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
                'label' => esc_html__('Appbuff Logo Carousel', 'appbuff'),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'appbuff'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'appbuff'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Slider', 'appbuff'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'link' => esc_html__('#', 'appbuff'),
                    ],

                    [
                        'link' => esc_html__('#', 'appbuff'),

                    ],

                    [
                        'link' => esc_html__('#', 'appbuff'),

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
        <div class="bages-slider owl-carousel mt20" style="overflow:hidden">
            <?php
            foreach (  $settings['logo'] as $logo ) {
                ?>
                <div class="img-badge-">
                    <a href="<?php echo $logo['link']['url']; ?>"> <img src="<?php echo $logo['image']['url']; ?>" alt="Appbuff mobile app development company" class="img100w"></a> </div>
                <?php
			}
            
            ?>
        </div>
    <?php
    }

    protected function content_template() { }
}