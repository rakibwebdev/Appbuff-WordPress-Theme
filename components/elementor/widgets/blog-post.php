<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Blog_post extends Widget_Base {

    public function get_name() {
        return 'blog-post';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Blog Post', 'appbuff' );
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
                'label' => esc_html__('Appbuff Blog Post', 'appbuff'),
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label' => esc_html__('Number Of Post', 'appbuff'),
                'type' => Controls_Manager::TEXT,
                'default' => '2',
            ]
        );

        $this->end_controls_section();


    }

    protected function render( ) {
        $settings = $this->get_settings();
        $post_count = $settings['post_count'];
        $args  = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'post_per_page' => $post_count,
        ]; 
        $query = new \WP_Query($args);
        
        ?>
        <div class="footer-blog-">
            <h5>Latest Blogs</h5>
            <?php
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
                        
                        <div class="single-blog-">
                            <div class="post-thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a></div>
                            <div class="content">
                                <p class="post-meta"><span class="post-date"><i class="far fa-clock"></i><?php echo get_the_date(); ?></span></p>
                                <h4 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
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