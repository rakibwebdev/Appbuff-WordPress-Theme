<?php
/**
 * the template for displaying archive pages.
 */

get_header(); 
get_template_part( 'template-parts/blog/title', 'blog' ); // calling title part from blog dir
?>

<section id="main-content" class="main-container" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<?php if ( have_posts() ) : ?>
					<header class="xs-page-header">
                        <h2>
                            <?php printf(esc_html__('Tag archives for %s', 'appbuff'), single_tag_title('', false)); ?>
                        </h2>
                        <?php
                            // show tag description if exists
                            if (tag_description()) {
                                echo '<p>' . tag_description() . '</p>';
                            }
                        ?>
					</header>

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