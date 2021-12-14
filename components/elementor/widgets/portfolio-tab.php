<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_Tab extends Widget_Base {

    public function get_name() {
        return 'portfolio-tab';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Portfolio Tab', 'appbuff' );
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
        ?>
        <!--Start Portfolio-->
        <section class="portfolio-page pad-tb">
            <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-6">
                <div class="common-heading pp">
                    <span>Our Work</span>
                    <h2>Portfolio</h2>
                </div>
                </div>
                <div class="col-lg-6 v-center">
                <div class="filters">
                    <ul class="filter-menu">
                    <li data-filter="*" class="is-checked">All</li>
        
                    <?php
                        $args = array(
                            'post_type' => 'Portfolio',
                            'post_status' => 'publish',
                            // 'tax_query' => array(
                            //     array(
                            //         'taxonomy' => 'people',
                            //         'field'    => 'slug',
                            //         'terms'    => 'bob',
                            //     ),
                            // ),
                        );
                        $query = new \WP_Query( $args );
                        $cats = get_categories($query);

                        foreach($cats as $cat) { ?>
                            <li data-filter=".<?php echo $cat->name; ?>"><?php echo $cat->name; ?></li>
                        <?php
                        }
                    ?>
                    </ul>
                </div>
                </div>
            </div>
            <div class="row card-list">
                <div class="col-lg-12 col-md-12 grid-sizer"></div>
                        <?php
                            $args  = [
                                'post_type' => 'Portfolio',
                                'post_status' => 'publish',
                                'post_per_page' => 10,
                            ]; 
                            $query = new \WP_Query($args);
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post(); ?>
                                    <div class="col-lg-12 col-sm-12 single-card-item <?php the_category(); ?>">
                                        <div class="portfolio-block bg-gradient8">
                                            <div class="portfolio-item-info">
                                            <span><?php the_category(); ?></span>
                                            <h3 class="mt30 mb30"><a href="#"><?php the_title(); ?></a></h3>
                                            <div class="reviews-card pr-shadow">
                                                <div class="review-text">
                                                <p><?php the_content(); ?></p>
                                                </div>
                                                <div class="-client-details-">
                                                <div class="-reviewr">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                                                </div>
                                                <div class="reviewer-text">
                                                    <h4><?php the_author()?></h4>
                                                    <p><?php the_author_description() ?></p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portfolio-item-image">
                                            <a href="#"><?php the_post_thumbnail('full') ?></a>
                                        </div>
                                    </div>
                                <?php
                                }
                                \wp_reset_postdata();
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--End Portfolio-->
    <?php
    }

    protected function content_template() { }
}