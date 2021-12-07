<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>
   
<article <?php post_class('post pr--100 mt-4');?>>
<div class="isotope_item vrbloglist">
<div class="item-image">
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
				the_post_thumbnail('full'); 
			endif;
		break;
	}
	?>
	<span class="category-blog">
		<?php
			$category_list = get_the_category_list( ', ' );
				if ( $category_list ) {
					echo '<span class="meta-categories post-cat">
							<i class="fa fa-folder"> </i>
							'. $category_list .' 
						</span>';
				}
		?>
	</span>			
	</div>
	<div class="item-info blog-info">
		<div class="item-info blog-info">
			<?php appbuff_post_meta(); ?>
			<h4>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'appbuff' ) . ' </sup>';
				} ?>
			</h4>
			
			<p>
				<?php appbuff_excerpt( 40, null ); ?>
			</p>

		</div><!-- Entry header end -->
	</div><!-- Post body end -->
</div>
</article>