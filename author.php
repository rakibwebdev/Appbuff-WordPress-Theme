<?php
/**
 * the template for displaying archive pages.
 */

get_header(); 
get_template_part( 'template-parts/banner/blog/banner', 'content' );
?>

<section id="main-content" class="main-container" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<?php if ( have_posts() ) : ?>
					<div class="appbuff-page-header">
                        <h2>
                            <?php printf(esc_html__('All posts by %s.', 'appbuff'), get_the_author()); ?>
                        </h2>
                        <?php
                            // show author bio if exists
                            if (get_the_author_meta('description')) {
                                echo '<p>' . the_author_meta('description') . '</p>';
                            }
                        ?>
					</div>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog/content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php appbuff_paging_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/blog/content', 'none' ); ?>
				<?php endif; ?>
			</div><!-- .col-md-8 -->

			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #main-content -->
<?php get_footer(); ?>