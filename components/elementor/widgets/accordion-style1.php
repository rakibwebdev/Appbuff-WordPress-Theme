<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Accordion_style1 extends Widget_Base {

    public function get_name() {
        return 'accordion-stye1';
    }

    public function get_title() {
        return esc_html__( 'Appbuff Accordion Style 1', 'appbuff' );
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
                'label' => esc_html__('Appbuff Content', 'appbuff'),
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
            <div class="career-card-div">
            <div id="accordion" class="accordion">
            <div class="card-2">
            <div class="card-header" id="acc1">
            <button class="btn btn-link btn-block text-left acc-icon" type="button" data-toggle="collapse" data-target="#collapse-a" aria-expanded="true" aria-controls="collapse-a">
            Web & Visual Designer - 2 Post
            </button>
            </div>
            <div id="collapse-a" class="card-body collapse show p0" aria-labelledby="acc1" data-parent="#accordion">
            <div class="data-reqs">
            <h5 class="pt20 pb20">Overview</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <h5 class="pt20 pb20">Required experience</h5>
            <p>5 Years Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <h4 class="pb20 pt20">Skills Required:</h4>
            <ul class="list-ul ul-check">
            <li>Deep familiarity with Core PHP and Laravel</li>
            <li>Experience of Ajax &amp; Jquery</li>
            <li>Good understanding of JSON &amp; third-party libraries and APIs</li>
            <li>Should be able to understand entire development life cycle concept. (Design, build, deploy, test, deploy online &amp; support)</li>
            <li>Strong knowledge in Web Services &amp; API's, LBS, Social Network Integration etc.</li>
            <li>Strong knowledge in database (Mysql)</li>
            <li>Good Knowledge in Google APIs</li>
            <li>Good understanding of MVC concepts and design patterns</li>
            <li>Strong object oriented programming and design skills</li>
            <li>Knowledge in versioning Tools that includes like trunk, branch, export, import and copy will be an added advantage</li>
            </ul>
            <a href="#" class="btn-main bg-btn3 lnk mt20" data-toggle="modal" data-target="#modalform">Apply Now<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
            </div>
            </div>
            </div>
            <div class="card-2 mt30">
            <div class="card-header" id="acc2">
            <button class="btn btn-link btn-block text-left acc-icon collapsed" type="button" data-toggle="collapse" data-target="#collapse-b" aria-expanded="true" aria-controls="collapse-a">
            Head of UX and Design - 3 Post
            </button>
            </div>
            <div id="collapse-b" class="card-body collapse p0" aria-labelledby="acc2" data-parent="#accordion">
            <div class="data-reqs">
            <h5 class="pt20 pb20">Overview</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <h5 class="pt20 pb20">Required experience</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <h4 class="pb20 pt20">Skills Required:</h4>
            <ul class="list-ul ul-check">
            <li>Deep familiarity with Core PHP and Laravel</li>
            <li>Experience of Ajax &amp; Jquery</li>
            <li>Good understanding of JSON &amp; third-party libraries and APIs</li>
            <li>Should be able to understand entire development life cycle concept. (Design, build, deploy, test, deploy online &amp; support)</li>
            <li>Strong knowledge in Web Services &amp; API's, LBS, Social Network Integration etc.</li>
            <li>Strong knowledge in database (Mysql)</li>
            <li>Good Knowledge in Google APIs</li>
            <li>Good understanding of MVC concepts and design patterns</li>
            <li>Strong object oriented programming and design skills</li>
            <li>Knowledge in versioning Tools that includes like trunk, branch, export, import and copy will be an added advantage</li>
            </ul>
            <a href="#" class="btn-main bg-btn3 lnk mt20" data-toggle="modal" data-target="#modalform">Apply Now<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
    <?php
    }

    protected function content_template() { }
}