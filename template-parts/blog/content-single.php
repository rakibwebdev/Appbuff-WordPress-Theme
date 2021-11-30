<article id="post-<?php the_ID(); ?>" <?php post_class( ' post-details' ); ?>>
	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="entry-thumbnail post-media post-image">
			<?php 
			the_post_thumbnail( 'post-thumbnails' );
			?>
		</div>
	<?php endif; ?>
	<div class="post-body clearfix">

		<!-- Article header -->
		<header class="entry-header clearfix">
			<?php appbuff_post_meta(); ?>
			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>
		</header><!-- header end -->

		<!-- Article content -->
		<div class="entry-content clearfix">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading &rarr;', 'appbuff' ) );

				appbuff_link_pages();
			}
			?>
		</div> <!-- end entry-content -->
    </div> <!-- end post-body -->
</article>