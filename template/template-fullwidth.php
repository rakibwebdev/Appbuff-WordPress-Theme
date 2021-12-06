<?php
/**
 * Template Name: Full Width Template
 *
 * The template for displaying all pages.
 */
?>

<?php get_header(); 

get_template_part( 'template-parts/banner/page/banner', 'content' ); 


?>



<div class="page"  role="main">
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