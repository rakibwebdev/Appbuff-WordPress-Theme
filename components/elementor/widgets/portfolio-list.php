<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_List extends Widget_Base {

    public function get_name() {
        return 'portfolio-list';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Portfolio list', 'appbuff' );
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
                'label' => esc_html__('Appbuff Portfolio', 'appbuff'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Portfolio', 'appbuff' ),
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'OUR WORK', 'appbuff' ),
            ]
        );

        $this->end_controls_section();


    }

    protected function render( ) {
        $settings = $this->get_settings();
        $args  = [
            'post_type' => 'Portfolio',
            'post_status' => 'publish',
            'post_per_page' => 6,
        ]; 
        $query = new \WP_Query($args);

        ?>
        <div class="row">
            <?php
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
            <div class="col-lg-4 col-sm-6 col mt40 wow fadeIn" data-wow-delay="0.2s">
                <div class="isotope_item up-hor">
                    <div class="item-image">
                        <a href="#"><?php the_post_thumbnail('full') ?></a>
                    </div>
                    <div class="item-info-div shdo">
                        <h4><a href="#"><?php
                        echo mb_strimwidth(get_the_title(), 0, 18, '..'); ?></a></h4>
                            <?php
                                $terms = get_the_terms(get_the_ID(  ), 'portfolio_cat' );
                                foreach ($terms as $term) {
                                    ?>
                                    <p><?php echo $term->name ?></p>
                                <?php   
                                }
                            ?>
                    </div>
                </div>
            </div>
            <?php } 
            \wp_reset_postdata();
            }
            ?>
        </div>

        
    <?php
    }

    protected function content_template() { }
}