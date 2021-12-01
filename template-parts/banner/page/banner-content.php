<?php 
/**
 * Page banner
 */
$banner_img_link = APPBUFFF_IMG . '/banner/9.jpg';
?>
<!--Breadcrumb Area-->
<section class="breadcrumb-area banner-1" data-background="<?php echo $banner_img_link ?>">
<div class="text-block">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 v-center">
        <div class="bread-inner">
            <div class="bread-menu">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></li>
            </ul>
            </div>
            <div class="bread-title">
            <h2><?php the_title(); ?></h2>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
<!--End Breadcrumb Area-->