<article id="post-<?php the_ID(); ?>" <?php post_class( ' post-details' ); ?>>
	<div class="blog-header">
		<h1><?php the_title(); ?></h1>
		<div class="row mt20 mb20">
			<div class="col-md-8 col-9">
				<div class="media">
					<div class="user-image bdr-radius">
						<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                            <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="girl" class="img-fluid">
                        <?php else: ?>
                            <img src="<?php APPBUFFF_IMG . '/user-thumb/girl.jpg' ?>" alt="girl" class="img-fluid">
                        <?php endif; ?>
					</div>
					<div class="media-body user-info">
						<h5><?php echo the_author(); ?></h5>
						<p><?php $post_date = get_the_date( 'M d Y' ); echo $post_date; ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-3">
				<div class="postwatch"><i class="far fa-eye"></i> 120</div>
			</div>
		</div>
	</div>
	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="image-set">
			<?php 
			the_post_thumbnail( 'full' );
			?>
		</div>
	<?php endif; ?>
	<div class="blog-content mt30">
		<?php the_content(); ?>
	</div>
</article>