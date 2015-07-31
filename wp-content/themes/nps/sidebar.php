<?php
/**
 * The sidebar containing the main widget area
 *
 * @package nps
 */
?>
	
	</div><!-- close .main-content-inner -->
	
	<div class="sidebar col-lg-4">

		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'sidebar-1' ) ?>

		</div><!-- close .sidebar-padder -->
