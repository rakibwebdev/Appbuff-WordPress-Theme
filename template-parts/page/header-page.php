<header class="entry-header appbuff-entry-header"> 
    <?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
        <figure class="entry-thumbnail">
            <?php the_post_thumbnail(); ?>
        </figure>
    <?php endif; ?>
    <h2 class="appbuff-title"><?php the_title(); ?></h2>
</header> <!-- .entry-header -->
