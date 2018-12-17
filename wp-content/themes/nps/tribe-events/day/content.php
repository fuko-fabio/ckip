<?php
/**
 * Day View Content
 * The content template for the day view. This template is also used for
 * the response that is returned on day view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list tribe-events-day">
    <!-- Notices -->
    <?php tribe_events_the_notices() ?>
    <!-- List Header -->
    <?php do_action( 'tribe_events_before_header' ); ?>
    <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

        <!-- Header Navigation -->
        <?php do_action( 'tribe_events_before_header_nav' ); ?>
        <?php tribe_get_template_part( 'day/nav' ); ?>
        <?php do_action( 'tribe_events_after_header_nav' ); ?>

    </div>
    <!-- Events Loop -->
    <?php if ( have_posts() ) : ?>
        <?php do_action( 'tribe_events_before_loop' ); ?>
        <?php tribe_get_template_part( 'list/loop' ) ?>
        <?php do_action( 'tribe_events_after_loop' ); ?>
    <?php endif; ?>
    <hr class="separator"/>

</div><!-- #tribe-events-content -->
