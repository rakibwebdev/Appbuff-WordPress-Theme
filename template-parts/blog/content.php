<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>
   
<article <?php post_class('post');?>>
<div class="post-media">
	<?php 
	switch(get_post_format()){
		case 'video':
			$video_url	 	=	appbuff_meta_option( get_the_ID(), 'featured_video' );
			$embed_url	 	=	appbuff_video_embed($video_url);
			
			$thumbnail_src 	= 	(has_post_thumbnail()) 
								? get_the_post_thumbnail_url()
								: appbuff_youtube_cover($video_url);
								// if empty, returns null
			fw_print([$video_url, $thumbnail_src]); // video url & post thumbnail url.

		break;
		case 'audio':
			$soundcloud_url	=	appbuff_soundcloud_embed(
									appbuff_meta_option( get_the_ID(), 'featured_audio' )
								);
			fw_print([$soundcloud_url]); // sound cloud url
		
		break; 
		case 'gallery':
			$gallery_img	=	appbuff_meta_option( get_the_ID(), 'featured_gallery' );
			fw_print($gallery_img); // gallery images in array
		
		break; 
		default:
			if ( has_post_thumbnail() ) :
				//fw_print(get_the_post_thumbnail_url());  // post thumbnail url
				the_post_thumbnail(); 
			endif;
		break;
	}
	?>
	</div>
	<div class="post-body">
		<div class="entry-header">
			<?php appbuff_post_meta(); ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'appbuff' ) . ' </sup>';
				} ?>
			</h2>
			
			<div class="entry-content">
				<?php appbuff_excerpt( 40, null ); ?>
			</div>

			<div class="post-footer">
				<a class="btn btn-primary" href="<?php the_permalink(); ?>">
					<?php esc_html_e('Read More', 'appbuff') ?>
				</a>
			</div>

		</div><!-- Entry header end -->
	</div><!-- Post body end -->
</article>