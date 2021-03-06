<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * dynamic css, generated by customizer options
 */

// display navigation to the next/previous set of posts
// ----------------------------------------------------------------------------------------
function appbuff_post_nav() {
// Don't print empty markup if there's nowhere to navigate.
	$next_post	 = get_next_post();
	$pre_post	 = get_previous_post();
	if ( !$next_post && !$pre_post ) {
		return;
	}
?>
	<nav class="post-navigation clearfix">
		<div class="row">
			<div class="col-lg-6 col-md-6 mt30 mb30">
				<div class="post-navigation text-left">
					<?php if ( !empty( $pre_post ) ): ?>
						<a href="<?php echo get_the_permalink( $pre_post->ID ); ?>">
							<span><?php esc_html_e( 'Previous post', 'appbuff' ) ?></span>
							<h4><?php echo get_the_title( $pre_post->ID ) ?></h4>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 mt30 mb30">
				<div class="post-navigation text-left text-md-right">
					<?php if ( !empty( $next_post ) ): ?>
						<a href="<?php echo get_the_permalink( $next_post->ID ); ?>">
							<span><?php esc_html_e( 'Next post', 'appbuff' ) ?></span>
							<h4><?php echo get_the_title( $next_post->ID ) ?></h4>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>
<?php }


// display meta information for a specific post
// ----------------------------------------------------------------------------------------
function appbuff_get_breadcrumbs( $seperator = '', $word = '' ) {
	if ( defined( 'FW' ) ) {
		$word = appbuff_option( 'breadcrumb_length' );
	}
	echo '<ul class="breadcrumbs list-inline wow fadeInLeft" data-wow-duration="2s">';
	if ( !is_home() ) {
		echo '<li><a href="';
		echo esc_url( get_home_url( '/' ) );
		echo '">';
		echo esc_html__( 'Home', 'appbuff' );
		echo "</a></li> " . esc_attr( $seperator );
		if ( is_category() || is_single() ) {
			echo '<li>';
			$category	 = get_the_category();
			$post		 = get_queried_object();
			$postType	 = get_post_type_object( get_post_type( $post ) );
			if ( !empty( $category ) ) {
				echo esc_html( $category[ 0 ]->cat_name ) . '</li>';
			} else if ( $postType ) {
				echo esc_html( $postType->labels->singular_name ) . '</li>';
			}

			if ( is_single() ) {
				echo esc_attr( $seperator ) . "  <li>";
				echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
				echo '</li>';
			}
		} elseif ( is_page() ) {
			echo '<li>';
			echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
			echo '</li>';
		}
	}
	if ( is_tag() ) {
		single_tag_title();
	} elseif ( is_day() ) {
		echo"<li>" . esc_html__( 'Blogs for', 'appbuff' ) . " ";
		the_time( 'F jS, Y' );
		echo'</li>';
	} elseif ( is_month() ) {
		echo"<li>" . esc_html__( 'Blogs for', 'appbuff' ) . " ";
		the_time( 'F, Y' );
		echo'</li>';
	} elseif ( is_year() ) {
		echo"<li>" . esc_html__( 'Blogs for', 'appbuff' ) . " ";
		the_time( 'Y' );
		echo'</li>';
	} elseif ( is_author() ) {
		echo"<li>" . esc_html__( 'Author Blogs', 'appbuff' );
		echo'</li>';
	} elseif ( isset( $_GET[ 'paged' ] ) && !empty( $_GET[ 'paged' ] ) ) {
		echo "<li>" . esc_html__( 'Blogs', 'appbuff' );
		echo'</li>';
	} elseif ( is_search() ) {
		echo"<li>" . esc_html__( 'Search Result', 'appbuff' );
		echo'</li>';
	} elseif ( is_404() ) {
		echo"<li>" . esc_html__( '404 Not Found', 'appbuff' );
		echo'</li>';
	}
	echo '</ul>';
}


// display meta information for a specific post
// ----------------------------------------------------------------------------------------
function appbuff_post_meta() {
?>
	<div class="entry-blog">
		<?php 
			printf(
				'<span class="bypost"><a href="%2$s"><i class="fa fa-user"></i>%3$s</a></span>',
				get_avatar( get_the_author_meta( 'ID' ), 55 ), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
				get_the_author()
			);
			if ( get_post_type() === 'post' ) {
				echo '<span class="posted-on">
						<i class="fa fa-clock-o"></i> 
						'. get_the_date() . 
					'</span>';
			}
			$comment_count = get_comments_number();
			if ( $comment_count ) {
				echo '<span class="meta-categories post-cat">
						<i class="fas fa-comment-dots"> </i>
						'. $comment_count .' 
					</span>';
			}else{
				echo '<span>
					<i class="fas fa-comment-dots"> </i>
					0
				</span>';
			}
			
		?>
	</div>
<?php }


// display meta date for a specific post
// ----------------------------------------------------------------------------------------
function appbuff_post_meta_date() {
	if ( get_post_type() === 'post' ) {

		echo '<span class="post-meta-date meta-date">
				<span class="day">'. get_the_date( 'm' ) . '</span>
				'. get_the_date( 'M' ) . 
			 '</span>';
	}
}


// display navigation for archove pages
// ----------------------------------------------------------------------------------------
function appbuff_paging_nav() {


	if ( is_singular() ){
		return;
	}

	global $wp_query;

	// stop execution if there's only 1 page
	if ( $wp_query->max_num_pages <= 1 ){
		return;
	}

	$paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max	 = intval( $wp_query->max_num_pages );

	// add current page to the array
	if ( $paged >= 1 ){
		$links[] = $paged;
	}

	// add the pages around the current page to the array
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination justify-content-center">' . "\n";

	// previous Post Link
	if ( get_previous_posts_link() ){
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<i class="fa fa-angle-left"></i>' ) );
	}

	// link to first page, plus ellipses if necessary
	if ( !in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( !in_array( 2, $links ) )
			echo '<li>???</li>';
	}

	// link to current page, plus 2 pages in either direction if necessary
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	// link to last page, plus ellipses if necessary
	if ( !in_array( $max, $links ) ) {
		if ( !in_array( $max - 1, $links ) )
			echo '<li>???</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	// next Post Link
	if ( get_next_posts_link() ){
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '<i class="fa fa-angle-right"></i>' ) );
	}
	
	echo '</ul>' . "\n";
}

// display post share buttons
// ----------------------------------------------------------------------------------------
function appbuff_post_share() {
	$show_share = appbuff_option('blog_social_share', 'yes');
	if($show_share == 'yes'): ?>
		<div class="blog-share-icon text-left text-md-right">
			<span><?php esc_html_e('Share :','appbuff');?></span>
			<a class="facebook" 
					href="<?php esc_url( 'https://www.facebook.com/share.php?u=' . the_permalink());?>"
					><i class="fa fa-facebook"></i></a>
			<a class="twitter" 
					href="<?php esc_url( 'http://twitter.com/intent/tweet?status=' . the_title() . '+' . the_permalink());?>"
					><i class="fa fa-twitter"></i></a>
			<a class="linkedin" 
					href="<?php esc_url('http://www.linkedin.com/shareArticle?mini=true&url=' . the_permalink() . '&title=' . the_title() . '&source=' . home_url('/'));?>"
					><i class="fa fa-linkedin"></i></a></li>
			<a class="vimeo" 
					href="<?php esc_url( 'http://pinterest.com/pin/create/bookmarklet/?url=' . the_permalink() . '&is_video=false&description=' . the_title());?>"
					><i class="fa fa-pinterest-p"></i></a>
			<a class="googlePlus" 
					href="<?php esc_url('https://plus.google.com/share?url=' . the_permalink());?>"
					><i class="fa fa-google-plus"></i></a>
		</div>
	<?php endif;
}

// display post tags
// ----------------------------------------------------------------------------------------
function appbuff_post_tags() {
	$tag_list = get_the_tag_list( '', ' ' );
	if ( $tag_list ) {
		echo '<div class="post-tag-container">';
	
			echo '<div class="blog-post-tag">';
			echo '<span>' . esc_html__( 'Posted Under', 'appbuff' ) . '</span>';
				echo appbuff_kses( $tag_list );
			echo '</div>';
		echo '</div>';
	}
}


// comment walker
// ----------------------------------------------------------------------------------------
function appbuff_comment_style( $comment, $args, $depth ) {
	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li ';
		$add_below	 = 'div-comment';
	}
	?>
	<div class="user-image">
		<?php
		if ( $args[ 'avatar_size' ] != 0 ) {
			echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
		}
		?>
	</div>
	
	<<?php
	echo appbuff_kses( $tag );
	comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="media-body user-info"><?php }
	?>	
		<h5 class="mb10"><?php
				echo get_comment_author(). '<small>says</small>'; 
	
				?>
				
				<span class="pull-right"><?php
					comment_reply_link(
					array_merge(
					$args, array(
						'add_below'	 => $add_below,
						'depth'		 => $depth,
						'max_depth'	 => $args[ 'max_depth' ]
					) ) );
					?>
				</span>
				<span><?php echo get_comment_date();?></span>
			</h5>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'appbuff' ); ?></em><br/><?php }
			?>	
			<?php comment_text(); ?>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>
		</div><?php
	endif;
}


// pagination within pages or posts if it has a long content
// ----------------------------------------------------------------------------------------
function appbuff_link_pages() {
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'appbuff' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'number',
		'separator'			 => '  ',
		'nextpagelink'		 => esc_html__( 'Next ', 'appbuff' ) . '<I class="fa fa-angle-right"></i>',
		'previouspagelink'	 => '<I class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'appbuff' ),
	);
	wp_link_pages( $args );
}
