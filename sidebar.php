<?php
/**
 * displays sidebar
 */
?>


<div class="col-lg-4 col-md-12">
	<aside id="sidebar" class="sidebar" role="complementary">
		<?php
		if ( class_exists( 'woocommerce' ) ) {
			if ( is_cart() || is_checkout() || is_account_page() || is_shop ()) {
				dynamic_sidebar( 'sidebar-2' );
			} else {
				dynamic_sidebar( 'sidebar-1' );
			}
		} else {
			dynamic_sidebar( 'sidebar-1' );
		}
		?>
	</aside> <!-- #sidebar -->
</div><!-- Sidebar col end -->


