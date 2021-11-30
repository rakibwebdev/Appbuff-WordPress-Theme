<header class="header-pr nav-bg-b main-header navfix fixed-top menu-white">
  <div class="container-fluid m-pad">
    <div class="menu-header">
      <div class="dsk-logo">
        <a class="nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php 
          $logo = appbuff_src('logo');
            if($logo != ''): ?>
              <img src="<?php echo esc_url( appbuff_src('logo') ) ?>" alt="<?php bloginfo( 'name' ); ?>">
            <?php else: ?>
              <?php bloginfo( 'name' ); ?>
          <?php endif; 
        ?>
          <!-- <img src="images/white-logo.png" alt="Logo" class="mega-white-logo"/>
          <img src="images/logo.png" alt="Logo" class="mega-darks-logo"/> -->
        </a>
      </div>

      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <?php
        wp_nav_menu([
          'menu'            => 'primary',
          'theme_location'  => 'primary',
          'container'       => 'div',
          'container_id'    => 'primary-nav',
          'container_class' => 'custom-nav',
          'menu_id'         => 'main-menu',
          'menu_class'      => 'nav-list',
          'depth'           => 4,
          'walker'          => new appbuff_navwalker()
        ]);
      ?>
    </div>
  </div>
</header>