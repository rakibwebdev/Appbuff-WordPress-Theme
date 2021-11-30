<?php
/**
 * the template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<!--Start 404 Error-->
<section class="error bg-gradient pad-tb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt50 mb50">
                <div class="layer-div">
                    <div class="error-block">
                        <h1>Page not Found</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="images mt20">
                            <img src="<?php echo esc_url( APPBUFFF_IMG . '/shape/error-page.png') ?>" alt="error page" class="img-fluid"/>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-outline">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End 404 Error-->

<?php get_footer(); ?>