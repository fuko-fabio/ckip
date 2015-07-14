<?php
/**
 * The sidebar containing the main widget area
 *
 * @package nps
 */
?>
	
	</div><!-- close .main-content-inner -->
	
	<div class="sidebar col-12 col-lg-4">

		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
	
				<aside id="archives" class="widget widget_archive">
					<h3 class="widget-title"><?php _e( 'Archives', 'nps' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
	
				<aside id="meta" class="widget widget_meta"> 
					<h3 class="widget-title"><?php _e( 'Meta', 'nps' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
	
			<?php endif; ?>
			
		</div><!-- close .sidebar-padder -->