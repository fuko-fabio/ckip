<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
<div class="tribe-single-event">
    <?php tribe_events_the_notices() ?>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="event-img">
                <?php echo get_the_post_thumbnail($event_id, 'post-thumbnail', array('class' => 'fill-box')); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <?php the_title( '<h3 class="tribe-event-title">', '</h3>' ); ?>
            <div class="tribe-event-main-info">
                <?php echo tribe_events_event_schedule_details( $event_id, '<span class="tribe-events-term">', '</span>' ); ?>
                 <span class="tribe-events-cost">
                <?php if ( tribe_get_cost() ) : ?>
                   <?php echo tribe_get_cost( null, true ) ?>
                <?php endif; ?>
                </span>
            </div>
            <?php while ( have_posts() ) :  the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
        </div>
    </div>
    <?php while ( have_posts() ) :  the_post(); ?>
        <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
        <hr class="separator"/>
        <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
        <?php tribe_get_template_part( 'modules/meta' ); ?>
        <hr class="separator"/>
        <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
    <?php endwhile; ?>
</div>