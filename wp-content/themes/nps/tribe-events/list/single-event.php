<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<div class="list-event">
    <div class="event-head">
        <div class="row">
            <div class="col-xs-8">
                <a class="event-title" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
                    <?php the_title() ?>
                </a>
                <?php do_action( 'tribe_events_after_the_event_title' ) ?>
            </div>
            <div class="col-xs-4">
                <div class="event-time">
                    <?php echo tribe_events_event_schedule_details() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <div class="event-cost">
        <?php if ( tribe_get_cost() ) : ?>
            <span><?php echo tribe_get_cost( null, true ); ?></span>
        <?php endif; ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <div class="event-img">
                    <?php echo get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'fill-box')); ?>
                </div>
        </div>
        <div class="col-sm-8">
            <div class="event-excerpt">
                <?php do_action( 'tribe_events_before_the_content' ) ?>
                <?php the_excerpt() ?>
                <?php do_action( 'tribe_events_after_the_content' ); ?>
            </div>
            <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="btn btn-default" rel="bookmark"><?php esc_html_e( 'Find out more', 'tribe-events-calendar' ) ?></a>
        </div>
    </div>
</div>