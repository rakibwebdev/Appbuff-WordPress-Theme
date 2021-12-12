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
							<?php the_archive_title(); ?>
						</h2>
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