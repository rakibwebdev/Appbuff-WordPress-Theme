<?php
/**
 * Template Name: Home Page Template
 *
 * The template for displaying Homepage.
 */
?>

<?php get_header(); ?>

<div class="home-page"  role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Article content -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div> <!-- end entry-content -->

			
		</article>


	<?php endwhile; ?>
</div> 
<?php get_footer(); ?>