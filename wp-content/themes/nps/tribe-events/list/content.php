<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list">
	<!-- Notices -->
	<?php tribe_events_the_notices() ?>
    <!-- List Header -->
    <?php do_action( 'tribe_events_before_header' ) ?>
    <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

        <!-- Header Navigation -->
        <?php tribe_get_template_part( 'list/nav' ); ?>

    </div>
    <!-- #tribe-events-header -->
    <?php do_action( 'tribe_events_after_header' ) ?>
	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<?php tribe_get_template_part( 'list/loop' ) ?>
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>
    <hr class="separator"/>
</div><!-- #tribe-events-content -->
