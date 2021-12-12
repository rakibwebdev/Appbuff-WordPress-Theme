<nav class="navbar appbuff-navbar navbar-light navbar-expand-lg bg-faded">
  <h1 class="site-title navbar-brand"> 
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
      <?php 
      $logo = appbuff_src('logo');
      if($logo != ''): ?>
        <img src="<?php echo esc_url( appbuff_src('logo') ) ?>" alt="<?php bloginfo( 'name' ); ?>">
      <?php else: ?>
        <?php bloginfo( 'name' ); ?>
      <?php endif; ?>
    </a>
  </h1>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <?php
   wp_nav_menu([
     'menu'            => 'primary',
     'theme_location'  => 'primary',
     'container'       => 'div',
     'container_id'    => 'primary-nav',
     'container_class' => 'collapse navbar-collapse justify-content-end',
     'menu_id'         => 'main-menu',
     'menu_class'      => 'navbar-nav  main-menu',
     'depth'           => 4,
     'walker'          => new appbuff_navwalker()
   ]);
   ?>
</nav>