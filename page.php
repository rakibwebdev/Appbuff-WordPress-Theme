<?php
/**
 * the template for displaying all pages.
 */

get_header(); 
get_template_part( 'template-parts/page/title', 'page' );
?>
<div id="main-content" class="main-container blog-single"  role="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<div class="entry-content">
							<?php get_template_part( 'template-parts/blog/content', 'single' ); ?>
						</div> <!-- .entry-content -->
  
						<footer class="entry-footer">
							<?php
							if ( is_user_logged_in() ) {
								echo '<p>';
								edit_post_link( 
									esc_html__( 'Edit', 'appbuff' ), 
									'<span class="meta-edit">', 
									'</span>'
								);
								echo '</p>';
							}
							?>
						</footer> <!-- .entry-footer -->
					</article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
            </div> <!-- .col-md-8 -->

            <?php get_sidebar(); ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!--#main-content -->
<?php get_footer(); ?>