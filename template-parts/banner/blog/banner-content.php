<?php 
/**
 * Blog banner
 */
$banner_img_link = APPBUFFF_IMG . '/banner/6.jpg';
?>
<!--Breadcrumb Area-->
<section class="breadcrumb-area banner-2" style="background:url(<?php echo $banner_img_link  ?>);">
    <div class="text-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 v-center">
                    <div class="bread-inner">
                        <div class="bread-menu">
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                                <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Blog</a></li>
                                <li><a href="#">Blog Details</a></li>
                            </ul>
                        </div>
                        <div class="bread-title">
                            <h2><?php 
                            	if(!is_singular()){
                                 echo "Our Latest News";
                                }else{
                            		the_title(); 
                                    }
                                    ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Breadcrumb Area-->