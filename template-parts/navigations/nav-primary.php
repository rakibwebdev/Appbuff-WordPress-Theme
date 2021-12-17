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
      <div class="mobile-menu2">
        <ul class="mob-nav2">
          <li><a href="#" class="btn-round- trngl btn-br bg-btn btshad-b1"  data-toggle="modal" data-target="#menu-popup"><i class="fas fa-envelope-open-text"></i></a></li>
          <li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
        </ul>
      </div>
      <div class="custom-nav">
        <ul class="nav-list nav-right-btn">
          <!--menu right border-->
          <li class="contact-show">
            <a href="#" class="btn-round- trngl btn-br bg-btn"><i class="fas fa-phone-alt"></i></a>
            <div class="contact-inquiry">
            <div class="contact-info-">
              <div class="contct-heading">Avilable on WhatsApp</div>
              <div class="inquiry-card-nn hrbg">
              <div class="title-inq-c">FOR HR DEPARTMENT</div>
                <ul>
                  <li class="mb0"><img src="<?php echo esc_url( appbuff_src('hr_img') ) ?>" alt="us office" class="flags-size"> <a href="https://wa.me/+8801713138255" ><?php echo appbuff_option('hr_number') ?></a></li>
                </ul>
              </div>
              <div class="inquiry-card-nn">
              <div class="title-inq-c">FOR SALES DEPARTMENT</div>
              <ul>
                  <li><a href="https://wa.me/+8801712027879"><img src="images/flags/us.svg" alt="Bangladesh office" class="flags-size"> +880 1712 027 879</a></li>
                  <li><a href="https://wa.me/+8801712027879"><img src="images/flags/us.svg" alt="US office" class="flags-size"> +1-123-456-7890</a></li>
                  <li><i class="fab fa-skype"></i><a href="skype:adaptcoder?call" >adaptcoder</a></li>
                  <li><i class="fas fa-envelope"></i><a href="mailto:info@appbuff.io">info@appbuff.io</a></li>
              </ul>
              </div>
            </div>
            </div>
          </li>
          <li>
            <a href="get-quote.html" class="btn-br bg-btn3 btshad-b2 lnk">Client Area<span class="circle"></span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>