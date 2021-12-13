<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(defined('ELEMENTOR_VERSION')):

//include_once VINKMAG_COMPONENTS . '/editor/elementor/manager/controls.php';

class APPBUFF_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'APPBUFF_elementor_init'));
        add_action('elementor/widgets/widgets_registered', array($this, 'APPBUFF_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

    public function APPBUFF_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'appbuff-elements',
            [
                'title' =>esc_html__( 'Appbuff', 'appbuff' ),
                'icon' => 'eicon-post',
            ],
            1
        );
    }

    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
        //wp_enqueue_script( 'appbuff-elementor', APPBUFF_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), VINKMAG_VERSION, true );
    }

    public function APPBUFF_shortcode_elements($widgets_manager){

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/button-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_button_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/button-style2.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_button_style2());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/button-style3.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_button_style3());
        
        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/logo-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Logo_Carousel_Style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/logo-style2.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_client_logoset());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/logo-style3.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_badges());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/icon-list-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_icon_list_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/fun-fact.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_fun_fact());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/testimonial-slider-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_testimonial_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/image-box-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_image_box_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/image-box-style2.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_image_box_style2());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/image-box-style3.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_image_box_style3());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/service-box-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_service_box_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/service-box-style2.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_service_box_style2());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/accordion-style1.php';
        $widgets_manager->register_widget_type(new Elementor\Accordion_style1());

        require_once APPBUFFF_COMPONENTS.'/elementor/widgets/social-icons.php';
        $widgets_manager->register_widget_type(new Elementor\Appbuff_social_icons());
    }
    
	public static function APPBUFF_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new APPBUFF_Shortcode();
        }
        return self::$_instance;
    }

}
$APPBUFF_Shortcode = APPBUFF_Shortcode::APPBUFF_get_instance();

endif;